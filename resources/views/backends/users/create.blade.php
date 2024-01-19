@extends('layouts.backend')

@section('pageTitle')New User @endsection

@section('content')
    <div class="col-12">
        <h2>New User</h2>
        <form method="POST" action="{{ route('backends.users.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 row">
                <label for="role" class="col-sm-3 col-form-label">Role *</label>
                <div class="col-sm-9">
                    <select class="form-control" id="role" role="role">
                        <option>--- Select role ---</option>
                        <option value="buyer">Buyer</option>
                        <option value="seller">Seller</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="name" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="email" class="col-sm-3 col-form-label">Email *</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="password" class="col-sm-3 col-form-label">Password *</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="password" name="password">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="image" class="col-sm-3 col-form-label">Profile</label>
                <div class="col-sm-9">
                    <input type="file" class="form-control" id="image" name="image" accept="image/png, image/jpeg/, image/webp, image/svg">
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
@endsection
