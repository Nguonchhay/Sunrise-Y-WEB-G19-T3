@extends('layouts.backend')

@section('pageTitle')New Category @endsection

@section('content')
    <div class="col-12">
        <h2>New Category</h2>
        <div class="col-6">
            <form action="{{ route('backends.categories.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title *</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>           
    </div>
@endsection