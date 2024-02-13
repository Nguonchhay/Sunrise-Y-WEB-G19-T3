<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $loggedUser = Auth::user();
        $carts = Cart::where('user_id', $loggedUser->id)->orderBy('created_at', 'DESC')->get();
        $subTotal = 0.0;
        $total = 0.0;
        foreach ($carts as $cart) {
            $subTotal += $cart->total;
            $total += $cart->total;
        }

        // Create new order
        $orderData = [
            'user_id' => $loggedUser->id,
            'sub_total' => $subTotal,
            'total' => $total,
            'shipping' => 'DUMMY DATA'
        ];
        $order = Order::create($orderData);
        
        // Create order detail
        foreach ($carts as $cart) {
            $orderDetailData = [
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
                'qty' => $cart->qty,
                'unit_price' => $cart->product->unit_price,
                'total' => $cart->product->getTotalPrice($cart->qty)
            ];
            OrderDetail::create($orderDetailData);

            // Remove item from cart
            $cart->delete();
        }

        dd('Redirect to Order History of user');
    }
}
