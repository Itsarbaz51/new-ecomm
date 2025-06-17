<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Review;
use App\Models\Slide;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Ramsey\Uuid\Guid\Fields;

class AdminController extends Controller
{
    public function index()
    {
        // Recent 10 Orders
        $orders = Order::latest()->take(10)->get();

        // Dashboard Summary
        $dashboardDatas = DB::select("SELECT
            SUM(total) AS TotalAmount,
            SUM(CASE WHEN status = 'ordered' THEN total ELSE 0 END) AS TotalOrderedAmount,
            SUM(CASE WHEN status = 'delivered' THEN total ELSE 0 END) AS TotalDeliveredAmount,
            SUM(CASE WHEN status = 'cancelled' THEN total ELSE 0 END) AS TotalCancelledAmount,
            COUNT(*) AS Total,
            SUM(CASE WHEN status = 'ordered' THEN 1 ELSE 0 END) AS TotalOrdered,
            SUM(CASE WHEN status = 'delivered' THEN 1 ELSE 0 END) AS TotalDelivered,
            SUM(CASE WHEN status = 'cancelled' THEN 1 ELSE 0 END) AS TotalCancelled
        FROM orders
    ");

        // Monthly Revenue Chart Data
        $monthlyData = Order::selectRaw("MONTH(created_at) as month,
            SUM(total) as TotalAmount,
            SUM(CASE WHEN status = 'ordered' THEN total ELSE 0 END) AS TotalOrderedAmount,
            SUM(CASE WHEN status = 'delivered' THEN total ELSE 0 END) AS TotalDeliveredAmount,
            SUM(CASE WHEN status = 'cancelled' THEN total ELSE 0 END) AS TotalCancelledAmount
        ")
            ->whereYear('created_at', now()->year)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)'))
            ->get()
            ->keyBy('month');

        // Generate full 12 months even if empty
        $AmountM = [];
        $OrderedAmountM = [];
        $DeliveredAmountM = [];
        $CancelledAmountM = [];

        for ($i = 1; $i <= 12; $i++) {
            $AmountM[] = $monthlyData[$i]->TotalAmount ?? 0;
            $OrderedAmountM[] = $monthlyData[$i]->TotalOrderedAmount ?? 0;
            $DeliveredAmountM[] = $monthlyData[$i]->TotalDeliveredAmount ?? 0;
            $CancelledAmountM[] = $monthlyData[$i]->TotalCancelledAmount ?? 0;
        }

        // Totals
        $TotalAmount = array_sum($AmountM);
        $TotalOrderedAmount = array_sum($OrderedAmountM);
        $TotalDeliveredAmount = array_sum($DeliveredAmountM);
        $TotalCancelledAmount = array_sum($CancelledAmountM);

        return view('admin.index', [
            'orders' => $orders,
            'dashboardDatas' => $dashboardDatas,
            'AmountM' => implode(',', $AmountM),
            'OrderedAmountM' => implode(',', $OrderedAmountM),
            'DeliveredAmountM' => implode(',', $DeliveredAmountM),
            'CancelledAmountM' => implode(',', $CancelledAmountM),
            'TotalAmount' => $TotalAmount,
            'TotalOrderedAmount' => $TotalOrderedAmount,
            'TotalDeliveredAmount' => $TotalDeliveredAmount,
            'TotalCancelledAmount' => $TotalCancelledAmount,
        ]);
    }

    // brands
    public function brands()
    {
        $brands = Brand::orderBy('id', 'DESC')->paginate(10);
        return view('admin.brands', compact('brands'));
    }

    public function add_brand()
    {
        return view('admin.brand-add');
    }

    public function store_brand(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:brands,slug',
            'image' => 'mimes:png,jpg,jpeg,webp,avif|max:4096'
        ]);

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);

        $image = $request->file('image');
        $file_extension = $image->extension();
        $file_name = Carbon::now()->timestamp . '.' . $file_extension;
        $path = $image->storeAs('uploads/brands', $file_name, 'public');

        $brand->image = $file_name;
        $brand->save();

        return redirect()->route('admin.brands')->with('status', 'Brand added successfully');
    }

    public function edit_brand($id)
    {
        // dd($id);
        $brand = Brand::find($id);
        return view('admin.brand-edit', compact('brand'));
    }

    public function update_brand(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:brands,slug,' . $request->id,
            'image' => 'mimes:png,jpg,jpeg,webp,avif|max:4096'
        ]);

        $brand = Brand::find($request->id);
        if (!$brand) {
            return redirect()->route('admin.brands')->with('error', 'Brand not found');
        }

        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);

        if ($request->hasFile('image')) {
            if (File::exists('storage/uploads/brands/' . $brand->image)) {
                File::delete('storage/uploads/brands/' . $brand->image);
            }
        }

        $image = $request->file('image');
        $file_extension = $image->extension();
        $file_name = Carbon::now()->timestamp . '.' . $file_extension;
        $path = $image->storeAs('uploads/brands', $file_name, 'public');
        $brand->image = $file_name;

        $brand->save();

        return redirect()->route('admin.brands')->with('status', 'Brand updated successfully');
    }

    public function delete_brand($id)
    {
        $brand = Brand::find($id);
        if (!$brand) {
            return redirect()->route('admin.brands')->with('error', 'Brand not found');
        }

        if (File::exists('storage/uploads/brands/' . $brand->image)) {
            File::delete('storage/uploads/brands/' . $brand->image);
        }

        $brand->delete();

        return redirect()->route('admin.brands')->with('status', 'Brand deleted successfully');
    }

    //category
    public function categories()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(10);
        return view('admin.categories', compact('categories'));
    }

    public function add_category()
    {

        return view('admin.category-add');
    }

    public function store_category(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug',
            'image' => 'mimes:png,jpg,jpeg,webp,avif|max:4096',
            // 'parent_id' => 'required|integer|exists:categories,id'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->parent_id = $request->parent_id;

        $image = $request->file('image');
        $file_extension = $image->extension();
        $file_name = Carbon::now()->timestamp . '.' . $file_extension;
        $path = $image->storeAs('uploads/categories', $file_name, 'public');

        $category->image = $file_name;
        $category->save();

        return redirect()->route('admin.categories')->with('status', 'Category added successfully');
    }

    public function edit_category($id)
    {
        $category = Category::find($id);
        return view('admin.category-edit', compact('category'));
    }

    public function update_category(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug',
            'image' => 'mimes:png,jpg,jpeg,,webp,avif|max:4096',
        ]);

        $category = Category::find($request->id);
        if (!$category) {
            return redirect()->route('admin.categories')->with('error', 'Category not found.');
        }
        $category->name = $request->name;
        $category->slug = Str::slug($request->slug);

        if ($request->hasFile('image')) {
            if (File::exists('storage/uploads/categories/' . $category->image)) {
                File::delete('storage/uploads/categories/' . $category->image);
            }
        }


        $image = $request->file('image');
        $image_extension = $image->extension();
        $file_name = Carbon::now()->timestamp . '.' . $image_extension;
        $path = $image->storeAs('uploads/categories', $file_name, 'public');
        $category->image = $file_name;

        $category->save();

        return redirect()->route('admin.categories')->with('status', 'Category Update Successfully!');
    }

    public function delete_category($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect()->route('admin.categories')->with('error', 'Category not found');
        }

        if (File::exists('storage/uploads/categories/' . $category->image)) {
            File::delete('storage/uploads/categories/' . $category->image);
        }

        $category->delete();

        return redirect()->route('admin.categories')->with('status', 'Category delete Successfully!');
    }

    //products
    public function products()
    {
        $products = Product::orderBy('id', 'DESC')->paginate(10);
        return view('admin.products', compact('products'));
    }

    public function add_products()
    {
        $categories = Category::select('id', 'name')->orderBy('id', 'DESC')->get();
        $brands = Brand::select('id', 'name')->orderBy('id', 'DESC')->get();

        return view('admin.product-add', compact('categories', 'brands'));
    }
    public function store_product(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:products,slug',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'SKU' => 'required',
            'stock_status' => 'required',
            'featured' => 'required|boolean',
            'quantity' => 'required|integer',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp|max:4096',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:4096',

            // 'color' => 'required|array|min:1',
            // 'colors.*' => 'required|string',
            'sizes' => 'required|array|min:1',
            'sizes.*' => 'required|string',
            'weight' => 'required|numeric',

            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
        ]);
        // dd($request);

        $product = new Product();
        $product->name = $request->name;
        $product->slug = Str::slug($request->slug);
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->regular_price = $request->regular_price;
        $product->sale_price = $request->sale_price;
        $product->SKU = $request->SKU;
        $product->stock_status = $request->stock_status;
        $product->featured = $request->featured;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->weight = $request->weight;

        $product->sizes = json_encode($request->sizes);    // or implode(',', $request->size)
        // $product->colors = json_encode($request->colors);  // or implode(',', $request->color)
        // dd($product);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file_name = Carbon::now()->timestamp . '.' . $image->extension();
            $image->storeAs('uploads/products/thumbnails/', $file_name, 'public');
            $product->image = $file_name;
        }

        if ($request->hasFile('images')) {
            $gallery_array = [];
            $counter = 1;
            foreach ($request->file('images') as $file) {
                $file_name = Carbon::now()->timestamp . '_' . $counter . '.' . $file->extension();
                $file->storeAs('uploads/products/gallery/', $file_name, 'public');
                $gallery_array[] = $file_name;
                $counter++;
            }
            $product->images = implode(',', $gallery_array);
        }

        $product->save();

        return redirect()->route('admin.products')->with('status', 'Product added successfully');
    }

    public function edit_product($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('admin.products')->with('error', 'Product not found');
        }
        $categories = Category::select('id', 'name')->orderBy('id', 'DESC')->get();
        $brands = Brand::select('id', 'name')->orderBy('id', 'DESC')->get();

        return view('admin.product-edit', compact('product', 'categories', 'brands'));
    }

    public function update_product(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:products,slug,' . $request->id,
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'SKU' => 'required',
            'stock_status' => 'required',
            'featured' => 'required|boolean',
            'quantity' => 'required|integer|min:0',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp|max:4096',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:4096',
            'category_id' => 'required',
            'brand_id' => 'required',

            // 'color' => 'required|array|min:1',
            // 'colors.*' => 'required|string',
            'sizes' => 'required|array|min:1',
            'sizes.*' => 'required|string',
            'weight' => 'required|numeric',
        ]);

        $product = Product::find($request->id);
        if (!$product) {
            return redirect()->route('admin.products')->with('error', 'Product not found.');
        }

        // Update basic fields
        $product->fill([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'short_description' => $request->short_description,
            'description' => $request->description,
            'regular_price' => $request->regular_price,
            'sale_price' => $request->sale_price,
            'SKU' => $request->SKU,
            'stock_status' => $request->stock_status,
            'featured' => $request->featured,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'weight' => $request->weight,

            'sizes' => json_encode($request->sizes),
            // 'colors' => json_encode($request->colors),

        ]);

        // Delete old thumbnail image
        if ($request->hasFile('image') && File::exists(public_path('storage/uploads/products/thumbnails/' . $product->image))) {
            File::delete(public_path('storage/uploads/products/thumbnails/' . $product->image));
        }

        // Upload new thumbnail image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file_name = Carbon::now()->timestamp . '.' . $image->extension();
            $image->storeAs('uploads/products/thumbnails/', $file_name, 'public');
            $product->image = $file_name;
        }

        // Delete old gallery images
        if ($request->hasFile('images') && !empty($product->images)) {
            foreach (explode(',', $product->images) as $gallery_image) {
                $image_path = public_path('storage/uploads/products/gallery/' . trim($gallery_image));
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
        }

        // Upload new gallery images
        if ($request->hasFile('images')) {
            $gallery_array = [];
            $counter = 1;

            foreach ($request->file('images') as $file) {
                $file_name = Carbon::now()->timestamp . '_' . $counter . '.' . $file->extension();
                $file->storeAs('uploads/products/gallery/', $file_name, 'public');
                $gallery_array[] = $file_name;
                $counter++;
            }

            $product->images = implode(',', $gallery_array);
        }

        $product->save();

        return redirect()->route('admin.products')->with('status', 'Product updated successfully!');
    }


    public function delete_product($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('admin.products')->with('error', 'Product not found');
        }

        if (File::exists('storage/uploads/products/thumbnails/' . $product->image)) {
            File::delete('storage/uploads/products/thumbnails/' . $product->image);
        }

        if (File::exists('storage/uploads/products/gallery/' . $product->images)) {
            $gallery_images = explode(',', $product->images);
            foreach ($gallery_images as $image) {
                if (File::exists('storage/uploads/products/gallery/' . $image)) {
                    File::delete('storage/uploads/products/gallery/' . $image);
                }
            }
        }

        $product->delete();

        return redirect()->route('admin.products')->with('status', 'Product delete successfully');
    }

    // coupons
    public function coupons()
    {
        $coupons = Coupon::orderBy('expiry_date', 'DESC')->paginate(12);
        return view('admin.coupons', compact('coupons'));
    }

    public function add_coupon()
    {
        return view('admin.coupon-add');
    }

    public function store_coupon(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'type' => 'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expiry_date' => 'required|date',
        ]);

        $coupon = new Coupon();
        $coupon->code = $request->code;
        $coupon->type = $request->type;
        $coupon->value = $request->value;
        $coupon->cart_value = $request->cart_value;
        $coupon->expiry_date = $request->expiry_date;
        $coupon->save();

        return redirect()->route('admin.coupons')->with('status', 'Coupon added successfully');
    }

    public function edit_coupon($id)
    {
        $coupon = Coupon::find($id);
        if (!$coupon) {
            return redirect()->route('admin.coupons')->with('error', 'Coupon not found');
        }


        return view('admin.coupon-edit', compact('coupon'));
    }

    public function update_coupon(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'type' => 'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expiry_date' => 'required|date',
        ]);

        $coupon = Coupon::find($request->id);
        // dd($coupon);
        if (!$coupon) {
            return redirect()->route('admin.coupons')->with('error', 'Coupon not found');
        }

        $coupon->code = $request->code;
        $coupon->type = $request->type;
        $coupon->value = $request->value;
        $coupon->cart_value = $request->cart_value;
        $coupon->expiry_date = $request->expiry_date;
        $coupon->save();

        return redirect()->route('admin.coupons')->with('status', 'Coupon updated successfully');
    }

    public function delete_coupon($id)
    {
        $coupon = Coupon::find($id);
        if (!$coupon) {
            return redirect()->route('admin.coupons')->with('error', 'Coupon not found');
        }

        $coupon->delete();

        return redirect()->route('admin.coupons')->with('status', 'Coupon deleted successfully');
    }

    // orders
    public function orders()
    {
        $orders = Order::orderBy('created_at', 'DESC')->paginate(12);
        return view('admin.orders', compact('orders'));
    }

    public function details_order($order_id)
    {
        // dd($order_id);
        $order = Order::find($order_id);
        if (!$order) {
            return redirect()->route('admin.orders')->with('error', 'Order not found');
        }

        $orderItems = OrderItem::where('order_id', $order_id)->orderBy('id')->paginate(12);
        if (!$orderItems) {
            return redirect()->route('admin.orders')->with('error', 'Order items not found');
        }

        $transaction = Transaction::where('order_id', $order_id)->first();
        if (!$transaction) {
            return redirect()->route('admin.orders')->with('error', 'Transaction not found');
        }

        return view('admin.order-details', compact('order', 'orderItems', 'transaction'));
    }

    public function update_order_status(Request $request)
    {
        $order = Order::find($request->order_id);
        if (!$order) {
            return redirect()->route('admin.orders')->with('error', 'Order not found');
        }

        $order->status = $request->order_status;
        if ($request->order_status == 'delivered') {
            $order->delivery_date = Carbon::now();
        } else if ($request->order_status == 'cancelled') {
            $order->cancelled_date = Carbon::now();
        }
        $order->save();

        if ($request->order_status == 'delivered') {
            $transaction = Transaction::where('order_id', $request->order_id)->first();
            $transaction->status = 'success';
            $transaction->save();
        }

        return back()->with('status', 'Status Change Successfully!');
    }

    // Show the order tracking page
    // public function trackingPage()
    // {
    //     return view('admin.order-tracking');
    // }

    // Process the tracking request
    // public function track(Request $request)
    // {
    //     $order = Order::where('id', $request->order_id)->first();

    //     if (!$order) {
    //         return redirect()->back()->with('error', 'Order not found');
    //     }

    //     return redirect()->route('order.tracking')->with('order', $order);
    // }



    // slides
    public function slides()
    {
        $slides = Slide::orderBy('id', 'DESC')->paginate(12);
        return view('admin.slides', compact('slides'));
    }

    public function add_slide()
    {
        return view('admin.slide-add');
    }

    public function store_slide(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'status' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,webp|max:2048',
        ]);

        $slide = new Slide();
        $slide->title = $request->title;
        $slide->link = $request->link;
        $slide->status = $request->status;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file_extension = $image->extension();
            $file_name = Carbon::now()->timestamp . '.' . $file_extension;
            $path = $image->storeAs('uploads/slides', $file_name, 'public');
            $slide->image = $file_name;
        }
        $slide->save();

        return redirect()->route('admin.slides')->with('status', 'Slide Added Successfully!');
    }

    public function edit_slide($id)
    {
        $slide = Slide::find($id);
        return view('admin.slide-edit', compact('slide'));
    }

    public function update_slide(Request $request)
    {
        $request->validate([
            'title' => 'nullable',
            'link' => 'nullable',
            'status' => 'nullable',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp|max:2048',
        ]);

        $slide = Slide::find($request->id);
        if (!$slide) {
            return redirect()->route('admin.slides')->with('error', 'slide not found');
        }

        $slide->title = $request->title;
        $slide->link = $request->link;
        $slide->status = $request->status;

        if ($request->hasFile('image')) {
            if (File::exists('storage/uploads/slides/' . $slide->image)) {
                File::delete('storage/uploads/slides/' . $slide->image);
            }
            $image = $request->file('image');
            $file_extension = $image->extension();
            $file_name = Carbon::now()->timestamp . '.' . $file_extension;
            $path = $image->storeAs('uploads/slides', $file_name, 'public');
            $slide->image = $file_name;
        }


        $slide->save();

        return redirect()->route('admin.slides')->with('status', 'Slide updated successfully');
    }

    public function delete_slide($id)
    {
        $slide = Slide::find($id);
        if (!$slide) {
            return redirect()->route('admin.slides')->with('error', 'slide not found');
        }

        if (File::exists(public_path('storage/uploads/slides/' . $slide->image))) {
            File::delete(public_path('storage/uploads/slides/' . $slide->image));
        }

        $slide->delete();

        return redirect()->route('admin.slides')->with('status', 'Slide deleted successfully');
    }

    // contacts
    public function contacts()
    {
        $contacts = Contact::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.contacts', compact('contacts'));
    }

    public function delete_contact($id)
    {
        $contact = Contact::find($id);
        if (!$contact) {
            return redirect()->route('admin.contacts')->with('error', 'Contact not found');
        }

        $contact->delete();

        return redirect()->route('admin.contacts')->with('status', 'Contact deleted successfully');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Product::where('name', 'LIKE', "%{$query}%")->get()->take(8);

        return response()->json($results);
    }

    public function users()
    {
        $users = User::withCount('orders')
            ->orderBy('created_at', 'DESC')
            ->where('utype', 'USR')
            ->paginate(12);


        return view('admin.users', compact('users'));
    }

    public function edit_account_details($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login to proceed.');
        }
        return view('admin.setting', compact('user'));
    }

    public function update_account_details(Request $request)
    {
        $request->validate([
            'name' => 'nullable|max:100',
            'mobile' => 'nullable|numeric|digits:10',
            'email' => 'nullable|email',
            'old_password' => 'nullable|min:6',
            'new_password' => 'nullable|string|min:6|different:old_password|confirmed',
            'image' => 'max:2048',

        ]);

        $user = Auth::user();
        if (!$user->id) {
            return redirect()->route('login')->with('error', 'Please login to proceed.');
        }


        if ($user->id && $user->utype == 'Admin') {
            // dd($request->file('image'));
            // dd($user->image);
            $user = User::find($user->id);
            if ($request->filled('name') || $request->filled('email') || $request->filled('mobile')) {
                $user->name = $request->name;
                $user->email = $request->email;
                $user->mobile = $request->mobile;
            }

            if ($request->filled('old_password') || $request->filled('new_password') || $request->filled('new_password_confirmation')) {
                if (!Hash::check($request->old_password, $user->password)) {
                    return redirect()->back()->with('error', 'Old password is incorrect.');
                }


                $user->password = Hash::make($request->new_password);
            }

            if ($request->hasFile('image')) {
                if (File::exists('storage/uploads/adminImage/' . $user->image)) {
                    File::delete('storage/uploads/adminImage/' . $user->image);
                }

                $image = $request->file('image');
                $file_extension = $image->extension();
                $file_name = Carbon::now()->timestamp . '.' . $file_extension;
                $path = $image->storeAs('uploads/adminImage', $file_name, 'public');
                $user->image = $file_name;
            }



            $user->save();
        }

        return redirect()->back()->with('success', 'Admin updated successfully.');
    }

    public function profile()
    {
        $user_id = Auth::user()->id;
        $admin = User::where('id', $user_id)->where('utype', 'Admin')->first();

        return view('admin.admin-profile', compact('admin'));
    }

    // public function inboxs()
    // {
    //     $orders = Order::whereIn('status', ['Ordered', 'Delivered', 'Cancelled'])
    //         ->with('user')
    //         ->withCount('orderitems')
    //         ->latest()
    //         ->get();

    //     $orderByStatus = Order::groupBy('status');
    //     return view('admin.inbox', compact('orders', 'orderByStatus'));
    // }

    public function users_reviews()
    {
        $userReviews = Review::paginate(12);

        return view('admin.user-review', compact('userReviews'));
    }

    public function delete_reviews($id)
    {
        $review = Review::find($id);
        if (!$review) {
            return redirect()->route('admin.uses-reviews')->with('error', 'Review not found');
        }

        $review->delete();

        return redirect()->route('admin.uses-reviews')->with('status', 'Review deleted successfully');
    }
}
