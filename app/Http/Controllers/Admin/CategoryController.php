<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {
        $cat = Category::get();
        return view('admin.categories.categoriesList', compact('cat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:190|unique:categories,name',
        ]);

        $data = array(
            'name' => $request->name,
            'description' => $request->description,
        );


        if ($file = $request->file('img')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('assets/upload/cate', $name);

            $data['img'] = $name;
        }

        Category::create($data);

        return redirect()->back()->with([
            'variant' => 'success',
            'message' => 'Created Successfully.'
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
        $categories = Category::where('id', $id)->first();
        return view('admin.categories.categoryEdit', compact('categories'));
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
        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        if ($file = $request->file('img')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('assets/upload/cate', $name);

            $data['img'] = $name;
        }


        Category::where('id', $id)->update($data);

        return redirect()->route('category.index')->with([
            'variant' => 'success',
            'message' => 'Update Successfully.'
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
        $category = Category::findOrFail($id);

        // Finally, delete the category
        $category->delete();
        return redirect()->Route('category.index')->with([
            'variant' => 'danger',
            'message1' => 'Delete Successfully.'
        ]);
    }
}
