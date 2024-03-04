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
                        @can('userCreate')
                            <a href="{{ route('backends.users.create') }}" class="btn btn-primary">
                                New User
                            </a>
                        @endcan
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
                        <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('backends.users.edit', $user) }}" class="btn btn-default">Edit</a>
                                    <button onclick="deleteUser('{{ $user->id }}')" type="button" class="btn btn-danger">Delete</button>
                                    <form id="frmUser{{ $user->id }}" action="{{ route('backends.users.delete', $user) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                    </form>
                                    <script>
                                        function deleteUser(id) {
                                            if (confirm('Are you sure?')) {
                                                document.getElementById('frmUser' + id).submit();
                                            }
                                        }
                                    </script>
                                </div>
                            </td>
                    </tr>
                @endforeach
            </tbody>
        </table>                
    </div>
@endsection
