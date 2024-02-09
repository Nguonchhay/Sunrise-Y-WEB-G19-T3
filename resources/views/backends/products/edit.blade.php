@extends('layouts.backend')

@section('pageTitle')Edit Product @endsection

@section('content')
    <div class="col-12">
        <h2>Edit Product</h2>
        <div class="col-12">
            <form action="{{ route('backends.products.update', $product) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT');
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category *</label>
                            <select class="form-control" id="category_id" name="category_id" required>
                                <option value="">--- Choose Category --- </option>
                                @foreach($categories as $id => $title)
                                    <option @if($product->category_id == $id) selected @endif value="{{ $id }}">{{ $title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name *</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="unit_price" class="form-label">Unit Price *</label>
                            <input type="text" class="form-control" id="unit_price" name="unit_price" value="{{ $product->unit_price }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="qty_in_stock" class="form-label">Quantity in stock *</label>
                            <input type="text" class="form-control" id="qty_in_stock" name="qty_in_stock" value="{{ $product->qty_in_stock }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description </label>
                            <textarea class="form-control" id="description" name="description" required>{{ $product->description }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="image" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-12">
                                <input type="file" class="form-control" id="image" name="image" accept="image/png, image/jpeg/, image/webp, image/svg">
                                <span>Keep it blank if you do not want to change image</span>
                            </div>
                            <div class="col-sm-12">
                                <h3>Selected image</h3>
                                <img src="{{ asset($product->image_url) }}" class="w-100" />
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>           
    </div>
@endsection