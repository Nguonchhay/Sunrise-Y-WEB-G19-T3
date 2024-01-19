@extends('layouts.backend')

@section('pageTitle')Categories @endsection

@section('content')
    <div class="col-12">
        <h2>Categories</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">
                        <a href="{{ route('backends.categories.create') }}" class="btn btn-primary">New Category</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @if($categories->isEmpty())
                    <tr>
                        <td>There is no record</td>
                    </tr>
                @else
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->title }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('backends.categories.edit', $category) }}" class="btn btn-default">Edit</a>
                                    <button onclick="deleteCategory('{{ $category->id }}')" type="button" class="btn btn-danger">Delete</button>
                                    <form id="frmCategory{{ $category->id }}" action="{{ route('backends.categories.delete', $category) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                    </form>
                                    <script>
                                        function deleteCategory(id) {
                                            if (confirm('Are you sure?')) {
                                                document.getElementById('frmCategory' + id).submit();
                                            }
                                        }
                                    </script>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>                   
    </div>
@endsection