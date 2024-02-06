<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('backends.products.index')->with('products', $products);
    }

    public function create()
    {
        return view('backends.products.create');
    }

    public function store(Request $request)
    {
        Product::create($request->all());
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
