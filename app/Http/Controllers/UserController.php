<?php

namespace App\Http\Controllers;

use App\Mail\SendOtpMail;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Review;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // dd($user);
        $address = Address::where('user_id', $user->id)->first();

        return view('user.index', compact('address', 'user'));
    }

    public function orders()
    {
        $orders = Order::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(10);
        return view('user.orders', compact('orders'));
    }

    public function details_order($order_id)
    {
        $order = Order::where('user_id', Auth::user()->id)->where('id', $order_id)->first();

        if ($order) {
            // dd($order->id);
            $orderItems = OrderItem::where('order_id', $order->id)->orderBy('id')->paginate(12);
            $transaction = Transaction::where('order_id', $order->id)->first();
            return view('user.order-details', compact('order', 'orderItems', 'transaction'));
        } else {
            return redirect()->route('login');
        }
    }

    public function cancel_order(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->status = 'canceled';
        $order->cancelled_date = Carbon::now();
        $order->save();

        return redirect()->back()->with('success', 'Order cancelled successfully.');
    }

    public function address()
    {
        $user_id = Auth::user()->id;
        $address = Address::where('user_id', $user_id)->get();
        return view('user.account-address', compact('address'));
    }

    public function add_address()
    {
        return view('user.account-address-add');
    }

    public function store_address(Request $request)
    {
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

        $user_id = Auth::user()->id;
        if (!$user_id) {
            return redirect()->route('login')->with('error', 'Please login to proceed.');
        }

        if ($user_id) {
            $address = new Address();
            $address->user_id = $user_id;
            $address->name = $request->name;
            $address->phone = $request->phone;
            $address->zip = $request->zip;
            $address->state = $request->state;
            $address->city = $request->city;
            $address->address = $request->address;
            $address->locality = $request->locality;
            $address->landmark = $request->landmark;
            $address->country = 'India';
            $address->isdefault = $request->has('isdefault') ? 1 : 0;
            ;
            $address->save();
        }

        return redirect()->route('user.address')->with('success', 'Address added successfully.');
    }

    public function edit_address($id)
    {
        $address = Address::find($id);
        return view('user.account-address-edit', compact('address'));
    }

    public function update_address(Request $request)
    {
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

        $user_id = Auth::user()->id;
        if (!$user_id) {
            return redirect()->route('login')->with('error', 'Please login to proceed.');
        }

        if ($user_id) {
            $address = Address::find($request->id);
            $address->name = $request->name;
            $address->phone = $request->phone;
            $address->zip = $request->zip;
            $address->state = $request->state;
            $address->city = $request->city;
            $address->address = $request->address;
            $address->locality = $request->locality;
            $address->landmark = $request->landmark;
            $address->country = 'India';
            $address->isdefault = $request->has('isdefault') ? 1 : 0;
            ;
            $address->save();
        }

        return redirect()->route('user.address')->with('success', 'Address updated successfully.');
    }

    public function delete_address($id)
    {
        $address = Address::find($id);
        $address->delete();
        return redirect()->back()->with('success', 'Address deleted successfully.');
    }

    // public function account_details()
    // {
    //     return view('user.account-details');
    // }

    public function edit_account_details($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login to proceed.');
        }
        return view('user.account-details', compact('user'));
    }

    public function update_account_details(Request $request)
    {
        $request->validate([
            'name' => 'nullable|max:100',
            'mobil' => 'nullable|numeric|digits:10',
            'email' => 'nullable|email',
            'old_password' => 'nullable|min:6',
            'new_password' => 'nullable|string|min:6|different:old_password|confirmed',

        ]);

        $user_id = Auth::user()->id;
        if (!$user_id) {
            return redirect()->route('login')->with('error', 'Please login to proceed.');
        }

        if ($user_id) {
            $user = User::find($user_id);
            if ($request->filled('name') || $request->filled('email') || $request->filled('phone')) {
                $user->name = $request->name;
                $user->email = $request->email;
                $user->mobile = $request->phone;
            }

            if ($request->filled('old_password') || $request->filled('new_password') || $request->filled('new_password_confirmation')) {
                if (!Hash::check($request->old_password, $user->password)) {
                    return redirect()->back()->with('error', 'Old password is incorrect.');
                }


                $user->password = Hash::make($request->new_password);
            }

            $user->save();
        }

        return redirect()->back()->with('success', 'user updated successfully.');
    }


    public function account_wishlists()
    {
        $user_id = Auth::id();
        $wishlistItems = Cart::instance('wishlist')->content();

        // Get product IDs from wishlist
        $productIds = $wishlistItems->pluck('id')->toArray();

        // Fetch full product details
        $products = Product::whereIn('id', $productIds)->get();

        return view('user.account-wishlist', compact('wishlistItems', 'products'));
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $userEmail = $request->email;
        Mail::raw("New newsletter subscriber: $userEmail", function ($message) use ($userEmail) {
            $message->to('arbazkhan86787@gmail.com')
                ->subject('New Newsletter Subscription');
        });

        return back()->with('success', 'Thank you for subscribing!');
    }


}
