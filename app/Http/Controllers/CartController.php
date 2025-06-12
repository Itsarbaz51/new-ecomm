<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Razorpay\Api\Api;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index()
    {
        $items = Cart::instance('cart')->content();
        return view('cart', compact('items'));
    }

    public function add_to_cart(Request $request)
    {
        Cart::instance('cart')->add($request->id, $request->name, $request->quantity, $request->price)->associate('App\Models\Product');
        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully!');
    }

    public function increase_cart_quantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);

        return redirect()->back();
    }

    public function decrease_cart_quantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);

        return redirect()->back();
    }

    public function remove_item($rowId)
    {
        Cart::instance('cart')->remove($rowId);

        return redirect()->back();
    }

    public function empty_cart()
    {
        Cart::instance('cart')->destroy();
        return redirect()->back();
    }

    public function apply_coupon_code(Request $request)
    {
        $coupon_code = $request->coupon_code;
        if (isset($coupon_code)) {
            $coupon = Coupon::where('code', $coupon_code)->where('expiry_date', '>=', Carbon::today())->where('cart_value', '<=', Cart::instance('cart')->subtotal())->first();
            if (!$coupon) {
                return redirect()->back()->with('error', 'Invalid coupon code');
            } else {
                Session::put('coupon', [
                    'code' => $coupon->code,
                    'type' => $coupon->type,
                    'value' => $coupon->value,
                    'cart_value' => $coupon->cart_value,
                ]);
                $this->calculateDiscount();
                return redirect()->back()->with('success', 'Coupon code applied successfully!');
            }

        } else {
            return redirect()->back()->with('error', 'Invalid coupon code');
        }
    }

    public function calculateDiscount()
    {
        $discount = 0;
        if (Session::has('coupon')) {
            if (Session::get('coupon')['type'] == 'fixed') {
                $discount = Session::get('coupon')['value'];
            } else {
                $discount = (Cart::instance('cart')->subtotal() * Session::get('coupon')['value']) / 100;
            }

            $subtotalAfterDiscount = Cart::instance('cart')->subtotal() - $discount;
            $taxAfterDiscount = ($subtotalAfterDiscount * config('cart.tax')) / 100;
            $totalAferDiscount = $subtotalAfterDiscount + $taxAfterDiscount;

            Session::put('discount', [
                'discount' => number_format(floatval($discount), 2, '.', ''),
                'subtotal' => number_format(floatval($subtotalAfterDiscount), 2, '.', ''),
                'tax' => number_format(floatval($taxAfterDiscount), 2, '.', ''),
                'total' => number_format(floatval($totalAferDiscount), 2, '.', '')
            ]);
        }
    }

    public function remove_coupon_code()
    {
        Session::forget('coupon');
        Session::forget('discount');
        return redirect()->back()->with('success', 'Coupon code removed successfully!');
    }

    public function checkout()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to proceed to checkout.');
        }

        $address = Address::where('user_id', Auth::user()->id)->where('isdefault', 1)->first();
        return view('checkout', compact('address'));
    }

    public function place_an_order(Request $request)
    {
        $user_id = Auth::id();
        $address = Address::where('user_id', $user_id)->where('isdefault', true)->first();

        if (!$address) {
            $request->validate([
                'name' => 'required|max:100',
                'phone' => 'required|numeric|digits:10',
                'zip' => 'required|numeric|digits:6',
                'state' => 'required',
                'city' => 'required',
                'address' => 'required',
                'locality' => 'required',
                'landmark' => 'required',
            ]);

            $address = Address::create([
                'user_id' => $user_id,
                'name' => $request->name,
                'phone' => $request->phone,
                'zip' => $request->zip,
                'state' => $request->state,
                'city' => $request->city,
                'address' => $request->address,
                'locality' => $request->locality,
                'landmark' => $request->landmark,
                'country' => 'India',
                'isdefault' => true,
            ]);
        }

        $this->setAmountforCheckout();

        $order = new Order();
        $order->user_id = $user_id;
        $order->subtotal = floatval(str_replace(',', '', Session::get('checkout')['subtotal']));
        $order->discount = floatval(str_replace(',', '', Session::get('checkout')['discount']));
        $order->tax = floatval(str_replace(',', '', Session::get('checkout')['tax']));
        $order->total = floatval(str_replace(',', '', Session::get('checkout')['total']));
        $order->fill($address->only(['name', 'phone', 'locality', 'address', 'city', 'state', 'country', 'landmark', 'zip']));
        $order->save();

        foreach (Cart::instance('cart')->content() as $item) {
            OrderItem::create([
                'product_id' => $item->id,
                'order_id' => $order->id,
                'price' => $item->price,
                'quantity' => $item->qty,
            ]);
        }

        if ($request->mode == 'razorpay') {
            Transaction::create([
                'user_id' => $user_id,
                'order_id' => $order->id,
                'mode' => 'razorpay',
                'razorpay_order_id' => $request->razorpay_order_id, // From frontend
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'status' => $request->razorpay_payment_id ? 'success' : 'failed',
            ]);
        }


        if ($request->mode == 'cod') {
            Transaction::create([
                'user_id' => $user_id,
                'order_id' => $order->id,
                'mode' => 'cod',
                'status' => 'pending',
            ]);
        }

        Cart::instance('cart')->destroy();
        Session::forget(['checkout', 'coupon', 'discount']);
        Session::put('order_id', $order->id);

        return redirect()->route('cart.order.confirmation');
    }

    public function createRazorpayOrder(Request $request)
    {
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $amount = $request->amount;

        $razorpayOrder = $api->order->create([
            'receipt' => 'rcpt_' . rand(1000, 9999),
            'amount' => $amount,
            'currency' => 'INR',
            'payment_capture' => 1
        ]);

        return response()->json([
            'order_id' => $razorpayOrder['id']
        ]);
    }


    public function setAmountforCheckout()
    {
        if (!Cart::instance('cart')->content()->count() > 0) {
            Session::forget('checkout');
            return;
        }

        if (Session::has('coupon')) {
            Session::put('checkout', [
                'discount' => Session::get('discount')['discount'],
                'subtotal' => Session::get('discount')['subtotal'],
                'tax' => Session::get('discount')['tax'],
                'total' => Session::get('discount')['total'],
            ]);
        } else {
            Session::put('checkout', [
                'discount' => 0,
                'subtotal' => Cart::instance('cart')->subtotal(),
                'tax' => Cart::instance('cart')->tax(),
                'total' => Cart::instance('cart')->total(),
            ]);
        }
    }

    public function order_confirmation()
    {
        if (Session::has('order_id')) {
            $order = Order::find(Session::get('order_id'));
            return view('order-confirmation', compact('order'));
        }
        return redirect()->route('cart.index');
    }
}
