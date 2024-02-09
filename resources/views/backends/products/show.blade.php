@extends('layouts.backend')

@section('pageTitle')Detail Product @endsection

@section('content')
    <div class="col-12">
        <h2>Detail Product</h2>
        <div class="col-12">
            <form>
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category *</label>
                            <input type="text" class="form-control" id="category_id" name="category_id" value="{{ $product->category->title }}" readonly required>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name *</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" readonly required>
                        </div>

                        <div class="mb-3">
                            <label for="unit_price" class="form-label">Unit Price *</label>
                            <input type="text" class="form-control" id="unit_price" name="unit_price" value="{{ $product->unit_price }}" readonly required>
                        </div>

                        <div class="mb-3">
                            <label for="qty_in_stock" class="form-label">Quantity in stock *</label>
                            <input type="text" class="form-control" id="qty_in_stock" name="qty_in_stock" value="{{ $product->qty_in_stock }}" readonly required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description </label>
                            <textarea class="form-control" id="description" name="description" readonly required>{{ $product->description }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="image" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-12">
                                <img src="{{ asset($product->image_url) }}" class="w-100" />
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('backends.products.index') }}" class="btn btn-primary">Back to list</a>
                    </div>
                </div>
            </form>
        </div>           
    </div>
@endsection