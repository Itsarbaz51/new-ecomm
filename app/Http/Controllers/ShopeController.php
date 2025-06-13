<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ShopeController extends Controller
{
    public function index(Request $request)
    {
        $size = $request->query('size') ? $request->query('size') : 12;
        $o_column = '';
        $o_order = '';
        $order = $request->query('order') ? $request->query('order') : -1;
        $f_brands = $request->query('brands');
        $f_categories = $request->query('categories');
        $min_price = $request->query('min') ? $request->query('min') : 1;
        $max_price = $request->query('max') ? $request->query('max') : 10000;

        switch ($order) {
            case 1:
                $o_column = 'created_at';
                $o_order = 'DESC';
                break;

            case 2:
                $o_column = 'created_at';
                $o_order = 'ASC';
                break;

            case 3:
                $o_column = 'sale_price';
                $o_order = 'ASC';
                break;

            case 4:
                $o_column = 'sale_price';
                $o_order = 'DESC';
                break;

            default:
                $o_column = 'id';
                $o_order = 'DESC';
                break;
        }

        $current_category = null;

        if (!empty($f_categories)) {
            $first_category_id = explode(',', $f_categories)[0];
            $current_category = Category::find($first_category_id);
        }


        $brands = Brand::orderBy('name', 'ASC')->get();
        $categories = Category::orderBy('name', 'ASC')->get();
        $products = Product::where(function ($query) use ($f_brands) {
            $query->whereIn('brand_id', explode(',', $f_brands))->orWhereRaw("'" . $f_brands . "'=''");
        })->where(function ($query) use ($f_categories) {
            $query->whereIn('category_id', explode(',', $f_categories))->orWhereRaw("'" . $f_categories . "'=''");
        })->where(function ($query) use ($min_price, $max_price) {
            $query->whereBetween('regular_price', [$min_price, $max_price])
                ->orWhereBetween('sale_price', [$min_price, $max_price]);
        })->orderBy($o_column, $o_order)->paginate($size);


        $reviews = Review::all();


        return view('shop', compact('products', 'size', 'current_category', 'order', 'brands', 'f_brands', 'categories', 'f_categories', 'min_price', 'max_price', 'reviews'));
    }

    public function product_details($product_slug)
    {
        $productSingle = Product::where('slug', $product_slug)->first();
        $products = Product::where('slug', '<>', $product_slug)->get()->take(8);
        $reviews = Review::all();

        return view('details', compact('productSingle', 'products', 'reviews'));
    }

    public function review_store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'comment' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'image' => 'nullable|image|max:2048',
        ]);

        // dd($request);
        $review = new Review();
        $review->name = $request->name;
        $review->email = $request->email;
        $review->rating = $request->rating;
        $review->product_id = $request->product_id;
        $review->comment = $request->comment;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = Carbon::now()->timestamp . '.' . $image->getClientOriginalExtension();
            $image->storeAs('uploads/reviewImage', $fileName, 'public');
            $review->image = $fileName;
        }

        $review->save();

        return redirect()->back()->with('success', 'Review submitted!');
    }
}
