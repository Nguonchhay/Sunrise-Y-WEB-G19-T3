@extends('layouts.backend')

@section('pageTitle')Users @endsection

@section('content')
    <div class="col-12">
        <h2>Users</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Role</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Profile</th>
                    <th scope="col">
                        <a href="{{ route('backends.users.create') }}" class="btn btn-primary">
                            New User
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->profile)
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalUser{{ $user->id }}">
                                    <i class="fas fa-image fa-2x"></i>
                                </a>

                                <div class="modal fade" id="modalUser{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <img src="{{ asset($user->profile) }}" class="w-100" />
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            @endif
                        </td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>                
    </div>
@endsection
