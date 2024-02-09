@extends('layouts.backend')

@section('pageTitle')New Product @endsection

@section('content')
    <div class="col-12">
        <h2>New Product</h2>
        <div class="col-12">
            <form action="{{ route('backends.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category *</label>
                            <select class="form-control" id="category_id" name="category_id" required>
                                <option value="" selected>--- Choose Category --- </option>
                                @foreach($categories as $id => $title)
                                    <option value="{{ $id }}">{{ $title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name *</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="unit_price" class="form-label">Unit Price *</label>
                            <input type="text" class="form-control" id="unit_price" name="unit_price" required>
                        </div>

                        <div class="mb-3">
                            <label for="qty_in_stock" class="form-label">Quantity in stock *</label>
                            <input type="text" class="form-control" id="qty_in_stock" name="qty_in_stock" value="0" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description </label>
                            <textarea class="form-control" id="description" name="description" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="image" class="col-sm-3 col-form-label">Image *</label>
                            <div class="col-sm-12">
                                <input type="file" class="form-control" id="image" name="image" required accept="image/png, image/jpeg/, image/webp, image/svg">
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