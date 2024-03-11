<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryAPIController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return response()->json($categories);
    }

    public function store(Request $request)
    {
        $category = Category::create($request->all());
        return response()->json($category);
    }
}
