<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{

    public function index()
    {
        $carts = Cart::where('user_id', Auth::id())->orderBy('created_at', 'DESC')->get();
        return view('pages.carts.index', [
            'carts' => $carts
        ]);
    }

    public function store(Product $product, Request $request)
    {
        Cart::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'qty' => 1,
            'total' => $product->getTotalPrice(1)
        ]);

        return redirect(route('carts.index'));
    }

    public function updateQuantity(Cart $cart, Request $request)
    {
        $qty = intval($request->get('new_qty'));
        $cart->qty = $qty < 1 ? 1 : $qty;
        $cart->save();
        return redirect(route('carts.index'));
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect(route('carts.index'));
    }
}
