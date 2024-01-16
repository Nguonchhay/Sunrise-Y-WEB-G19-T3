<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('backends.categories.index')->with('categories', $categories);
    }

    public function create()
    {
        return view('backends.categories.create');
    }

    public function store(Request $request)
    {
        Category::create($request->all());
        return redirect(route('backends.categories.index'));
    }

    public function edit(Category $category)
    {
        return view('backends.categories.edit', [
            'category' => $category
        ]);
    }

    public function update(Category $category, Request $request)
    {
        $category->title = $request->get('title');
        $category->save();
        return redirect(route('backends.categories.index'));
    }

    public function destroy(Category $category)
    {
        // TO DO: delete existing category
    }
}
