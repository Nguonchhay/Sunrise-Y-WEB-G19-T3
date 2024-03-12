<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;

class ProductAPIController extends Controller
{
    public function index()
    {
        $products = Product::get();
        // OLD METHOD
        // $res = [];
        // foreach($products as $product) {
        //     $res[] = [
        //         "id" => $product->id,
        //         "category" =>  $product->category,
        //         "user" => $product->user,
        //         "image_url" => asset($product->image_url),
        //         "name" => $product->name,
        //         "description" =>  $product->description,
        //         "unit_price" => $product->unit_price
        //     ];
        // }
        // return response()->json($res);

        // return response()->json(
        //     ProductResource::collection($products)
        // );

        return response()->json(
            new ProductCollection($products)
        );
    }
}
