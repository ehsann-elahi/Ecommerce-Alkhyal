<?php

namespace  App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
 

public function index()
{
    $products = Cache::remember('all_products', 3600, function () {
        return Product::with('reviews')->get();
    });

    return view('admin.products.productList', compact('products'));
}

public function show(Product $product)
{
    $relatedProducts = Product::where('category_id', $product->category_id)
        ->where('id', '!=', $product->id)
        ->take(4)
        ->get();

    $reviewCount = $product->reviews->count();
    $averageRating = $product->reviews->avg('rating');

    return view('front.detail', compact(
        'product',
        'relatedProducts',
        'reviewCount',
        'averageRating'
    ));
}

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.createProduct', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'meta_description' => 'nullable|string|max:150',
            'slug' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        $data = [
            'category_id' => $request->category_id,
            'name' => $request->name,
            'title' => $request->title,
            'meta_description' => $request->meta_description,
            'slug' => $request->slug,
            'price' => $request->price,
            'stock' => $request->stock,
            'type' => $request->type,
            'description' => $request->description,
        ];

        if ($file = $request->file('img')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('assets/upload/prod', $name);

            $data['img'] = $name;
        }

        $product = Product::create($data);

Cache::forget('all_products');
        if ($files = $request->file('gallery')) {
            foreach ($files as $file) {
                $gallery = new Gallery;
                $name = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/upload/gallery'), $name);
                $gallery->photo = $name;
                $gallery->product_id = $product->id;
                $gallery->save();
            }
        }


        return redirect()->back()->with([
            'variant' => 'success',
            'message' => 'Product created successfully.'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::with('galleries')->findOrFail($id);

        return view('admin.products.productEdit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'meta_description' => 'nullable|string|max:150',
            'slug' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        $product = Product::findOrFail($id);

        $product->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'title' => $request->title,
            'meta_description' => $request->meta_description,
            'slug' => $request->slug,
            'price' => $request->price,
            'stock' => $request->stock,
            'type' => $request->type,
            'description' => $request->description,
        ]);

        Cache::forget('all_products');
        // Handle image upload
        if ($file = $request->file('img')) {
            $name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/upload/prod'), $name);
            $product->update(['img' => $name]);
        }

        // Handle gallery images
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $gallery = new Gallery();
                $name = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/upload/gallery'), $name);
                $gallery->photo = $name;
                $gallery->product_id = $product->id;
                $gallery->save();
            }
        }

        // Handle gallery image deletion
        if ($request->has('delete_gallery')) {
            foreach ($request->delete_gallery as $galleryId) {
                $gallery = Gallery::findOrFail($galleryId);
                if (file_exists(public_path('assets/upload/gallery/' . $gallery->photo))) {
                    unlink(public_path('assets/upload/gallery/' . $gallery->photo));
                }
                $gallery->delete();
            }
        }

        return redirect()->Route('product.index')->with([
            'variant' => 'success',
            'message' => 'Updated Successfully.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the category
        $products = Product::findOrFail($id);

        // Finally, delete the category
        $products->delete();
        Cache::forget('all_products');
        return redirect()->Route('product.index')->with([
            'variant' => 'danger',
            'message1' => 'Delete Successfully.'
        ]);
    }
}
