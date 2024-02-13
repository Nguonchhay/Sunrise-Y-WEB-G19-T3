@extends('layouts.app')

@section('pageTitle')Cart @endsection

@section('breadcrumb_heading')
    Cart
@endsection
@section('breadcrumb_label')
    <li class="breadcrumb-item active text-white">Cart</li>
@endsection

@section('content')
<div class="container-fluid py-5">
            <div class="container py-5">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Products</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Handle</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if ($carts->isEmpty())
                                <tr>
                                    <td colspan="10">No items in cart</td>
                                </tr>
                            @else
                                @foreach($carts as $cart)
                                    <tr>
                                        <th scope="row">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset($cart->product->image_url) }}" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                            </div>
                                        </th>
                                        <td>
                                            <p class="mb-0 mt-4">{{ $cart->product->name }}</p>
                                        </td>
                                        <td>
                                            <p class="mb-0 mt-4">{{ $cart->product->unit_price }} $</p>
                                        </td>
                                        <td>
                                            <div class="input-group mt-4" style="width: 100px;">
                                                <div class="input-group-btn">
                                                    <form action="{{ route('carts.update.qty', $cart) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="new_qty" value="{{ $cart->qty - 1 }}">
                                                        <button type="submit" class="btn btn-sm rounded-circle bg-light border" >
                                                            <i class="fa fa-minus"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                <input type="text" class="form-control form-control-sm text-center border-0" value="{{ $cart->qty }}">
                                                <div class="input-group-btn">
                                                    <form action="{{ route('carts.update.qty', $cart) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="new_qty" value="{{ $cart->qty + 1 }}">
                                                        <button type="submit" class="btn btn-sm rounded-circle bg-light border">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="mb-0 mt-4">{{ $cart->total }} $</p>
                                        </td>
                                        <td>
                                            <form action="{{ route('carts.destroy', $cart) }}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="btn btn-md rounded-circle bg-light border mt-4" >
                                                    <i class="fa fa-times text-danger"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="mt-5">
                    <input type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Coupon Code">
                    <button class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button">Apply Coupon</button>
                </div>
                <div class="row g-4 justify-content-end">
                    <div class="col-8"></div>
                    <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                        <div class="bg-light rounded">
                            <div class="p-4">
                                <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                                <div class="d-flex justify-content-between mb-4">
                                    <h5 class="mb-0 me-4">Subtotal:</h5>
                                    <p class="mb-0">${{ $subTotal }}</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h5 class="mb-0 me-4">Shipping</h5>
                                    <div class="">
                                        <p class="mb-0">Flat rate: $3.00</p>
                                    </div>
                                </div>
                                <p class="mb-0 text-end">Shipping to Ukraine.</p>
                            </div>
                            <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                <h5 class="mb-0 ps-4 me-4">Total</h5>
                                <p class="mb-0 pe-4">${{ $total }}</p>
                            </div>
                            <form action="{{ route('orders.store') }}" method="POST">
                                @csrf
                                <button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="submit">Proceed Checkout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection