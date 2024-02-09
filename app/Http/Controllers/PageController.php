<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class PageController extends Controller
{
    public function home()
    {
        $categories = Category::orderBy('created_at', 'desc')->limit(4)->get();
        return view('pages.home', [
            'categories' => $categories
        ]);
    }

    public function cart()
    {
        return view('pages.cart');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
