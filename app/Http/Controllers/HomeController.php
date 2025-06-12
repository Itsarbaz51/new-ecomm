<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Review;
use App\Models\Slide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $size = $request->query('size', 12);

        // Validate order column and direction
        $o_column = $request->query('column', 'created_at'); // fallback column
        $allowedColumns = ['name', 'price', 'created_at'];   // whitelist for security
        $o_column = in_array($o_column, $allowedColumns) ? $o_column : 'created_at';

        $order = strtolower($request->query('order', 'desc'));
        $o_order = in_array($order, ['asc', 'desc']) ? $order : 'desc';

        $f_brands = $request->query('brands');
        $f_categories = $request->query('categories');
        $min_price = $request->query('min', 1);
        $max_price = $request->query('max', 10000);

        $slides = Slide::where('status', 1)->take(3)->get();
        $categories = Category::orderBy('name')->get();

        $products = Product::where(function ($query) use ($f_brands) {
            if ($f_brands) {
                $query->whereIn('brand_id', explode(',', $f_brands));
            }
        })->where(function ($query) use ($f_categories) {
            if ($f_categories) {
                $query->whereIn('category_id', explode(',', $f_categories));
            }
        })->where(function ($query) use ($min_price, $max_price) {
            $query->whereBetween('regular_price', [$min_price, $max_price])
                ->orWhereBetween('sale_price', [$min_price, $max_price]);
        })->orderBy($o_column, $o_order)->paginate($size);


        $sproducts = Product::whereNotNull('sale_price')->where('sale_price', '<>', '')->inRandomOrder()->get()->take(8);
        $fproducts = Product::where('featured', 1)->get()->take(8);


        $reviews = Review::all();
        return view('home.index', compact('slides', 'categories', 'sproducts', 'fproducts', 'products', 'reviews'));
    }

    public function privacyPolicy()
    {
        return view('home.privacyPolicy');
    }
    public function refundPolicy()
    {
        return view('home.refundPolicy');
    }
    public function shippingPolicy()
    {
        return view('home.shippingPolicy');
    }
    public function termsOfService()
    {
        return view('home.termsOfService');
    }

    public function contact()
    {
        return view('home.contact');
    }
    public function faqs()
    {
        return view('home.faqs');
    }

    public function store_contact(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits:10',
            'comment' => 'required',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->comment = $request->comment;
        $contact->save();

        return redirect()->back()->with('success', 'Your message has been sent successfully.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $result = Product::where('name', 'LIKE', "%{$query}%")->get()->take(8);
        return response()->json($result);
    }

    public function about()
    {
        return view('home.about');
    }
}
