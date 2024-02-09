<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('backends.products.index')->with('products', $products);
    }

    public function create()
    {
        $categories = Category::pluck('title', 'id');
        return view('backends.products.create')->with('categories', $categories);
    }

    public function store(Request $request)
    {
        $productData = $request->all();
        $file = $request->file('image');
        if (!$file) {
            return back();
        }

        $filename = time() . '_' . $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $filenameAndPath =  'products/' . $filename . '.' . $extension;

        $file->storeAs('public/' . $filenameAndPath);
        $productData['image_url'] = 'storage/' . $filenameAndPath;

        Product::create($productData);
        return redirect(route('backends.products.index'));
    }

    public function edit(Product $product)
    {
        return view('backends.products.edit', [
            'product' => $product
        ]);
    }

    public function update(Product $product, Request $request)
    {
        $product->title = $request->get('title');
        $product->save();
        return redirect(route('backends.products.index'));
    }

    public function destroy(Product $product)
    {
        $category->delete();
        return redirect(route('backends.products.index'));
    }
}
