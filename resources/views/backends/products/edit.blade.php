@extends('layouts.backend')

@section('pageTitle')Edit Category @endsection

@section('content')
    <div class="col-12">
        <h2>Edit Category</h2>
        <div class="col-6">
            <form action="{{ route('backends.categories.update', $category) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Title *</label>
                    <input type="text" value="{{ $category->title }}" class="form-control" id="title" name="title" required>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>           
    </div>
@endsection