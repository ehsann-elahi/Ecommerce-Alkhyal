<?php

namespace  App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function login()
    {
        return view('front.login');
    }

    public function register_form()
    {
        return view('front.register');
    }

    public function index()
    {
        $products = Product::all();

        $productTypes = ['Featured', 'Latest', 'Special'];
        $productsByType = [];

        foreach ($productTypes as $type) {
            $productsByType[$type] = Product::where('type', $type)->get();
        }

        $categories = Category::all();


        return view('front.index', compact('categories', 'productsByType', 'productTypes', 'products'));
    }

    public function productDetail($slug)
    {

        $product = Product::with('reviews')->where('slug', $slug)->firstOrFail();

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        $reviewCount = $product->reviews->count();
        $averageRating = $product->reviews->avg('rating');

        return view('front.detail', compact('product', 'relatedProducts', 'reviewCount', 'averageRating'));
    }


    public function showAllProducts(Request $request)
    {
        $categoryId = $request->query('category_id');
        $sort = $request->query('sort');
        $limit = $request->query('limit', 9);

        $categories = Category::all();
        $productsQuery = Product::query();

        if ($categoryId && $categoryId !== 'all') {
            $productsQuery->where('category_id', $categoryId);
        }

        // Apply sort
        switch ($sort) {
            case 'price_low_high':
                $productsQuery->orderBy('price', 'asc');
                break;
            case 'price_high_low':
                $productsQuery->orderBy('price', 'desc');
                break;
            case 'name_asc':
                $productsQuery->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $productsQuery->orderBy('name', 'desc');
                break;
            default:
                // Optional default sorting
                break;
        }

        $products = $productsQuery->paginate($limit);
        $showFilter = true;

        return view('front.product', compact('products', 'categories', 'categoryId', 'showFilter'));
    }


    public function showCategoryProducts(Request $request, $name)
    {
        $decodedName = ucwords(str_replace('-', ' ', $name));
        $category = Category::where('name', $decodedName)->firstOrFail();
        $categoryId = $category->id; // 🔥 Pass this to Blade

        $sort = $request->query('sort');
        $limit = $request->query('limit', 9);
        $categories = Category::all();

        $productsQuery = Product::where('category_id', $categoryId);

        // Optional sorting
        switch ($sort) {
            case 'price_low_high':
                $productsQuery->orderBy('price', 'asc');
                break;
            case 'price_high_low':
                $productsQuery->orderBy('price', 'desc');
                break;
            case 'name_asc':
                $productsQuery->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $productsQuery->orderBy('name', 'desc');
                break;
        }

        $products = $productsQuery->paginate($limit);
        $showFilter = true;

        return view('front.product', compact('products', 'categories', 'categoryId', 'showFilter'));
    }


    public function cart()
    {
        $products = Product::all();
        return view('front.cart', compact('products'));
    }

    public function checkOut()
    {
        return view('front.checkout');
    }

    public function PrivacyPolicy()
    {
        return view('front.PrivacyPolicy');
    }

    public function getProduct($id)
    {
        $product = Product::with('galleries')->find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json([
            'id'          => $product->id,
            'name'        => $product->name,
            'price'       => $product->price,
            'description' => $product->description,
            'stock'       => $product->stock,
            'image'       => asset('assets/upload/prod/' . $product->img),
            'gallery'     => $product->galleries->isNotEmpty()
                ? $product->galleries->map(function ($image) {
                    return asset('assets/upload/gallery/' . $image->photo);
                })
                : [], // Empty array if no gallery images
        ]);
    }

    public function review(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'review' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'product_id' => 'required|exists:products,id',
        ]);

        Review::create([
            'product_id' => $request->product_id,
            'name' => $request->name,
            'review' => $request->review,
            'rating' => $request->rating,
        ]);

        return response()->json(['success' => 'Review submitted successfully!']);
    }

    public function wishlistPage()
    {
        $wishlist = Session::get('wishlist', []);

        // Wishlist me jo products hain unko database se fetch karna
        $products = Product::whereIn('id', $wishlist)->paginate(9);

        return view('front.wishlist', compact('products'));
    }

    public function comparePage()
    {
        $compare = Session::get('compare', []);

        // compare me jo products hain unko database se fetch karna
        $products = Product::whereIn('id', $compare)->paginate(9);

        return view('front.compare', compact('products'));
    }

    public function filterProducts(Request $request)
    {
        $query = Product::query();

        // Sorting logic
        if ($request->sort_by) {
            switch ($request->sort_by) {
                case 'name_asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('name', 'desc');
                    break;
                case 'price_low_high':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_high_low':
                    $query->orderBy('price', 'desc');
                    break;
            }
        }

        // Pagination limit
        $limit = $request->limit ?? 9;
        $products = $query->paginate($limit);

        return response()->json([
            'html' => view('front.partials.product-list', compact('products'))->render()
        ]);
    }

    public function about()
    {
        return view('front.about');
    }

    public function help()
    {
        return view('front.help');
    }

    public function getEstimate()
    {
        $products = Product::get();
        return view('front.getEstimate', compact('products'));
    }
}
