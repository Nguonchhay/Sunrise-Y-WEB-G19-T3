@extends('layouts.backend')

@section('pageTitle')Products @endsection

@section('content')
    <div class="col-12">
        <h2>Products</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity In Stock</th>
                    <th scope="col">
                        <a href="{{ route('backends.products.create') }}" class="btn btn-primary">New Product</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @if($products->isEmpty())
                    <tr>
                        <td colspan="7">There is no record</td>
                    </tr>
                @else
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $product->category->title }}</td>
                            <td>
                                @if($product->image_url)
                                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalProduct{{ $product->id }}">
                                        <i class="fas fa-image fa-2x"></i>
                                    </a>

                                    <div class="modal fade" id="modalProduct{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <img src="{{ asset($product->image_url) }}" class="w-100" />
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                @endif
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->qty_in_stock }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('backends.products.show', $product) }}" class="btn btn-default">Detail</a>
                                    <a href="{{ route('backends.products.edit', $product) }}" class="btn btn-default">Edit</a>
                                    <button onclick="deleteProduct('{{ $product->id }}')" type="button" class="btn btn-danger">Delete</button>
                                    <form id="frmProduct{{ $product->id }}" action="{{ route('backends.products.destroy', $product) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                    </form>
                                    <script>
                                        function deleteProduct(id) {
                                            if (confirm('Are you sure?')) {
                                                document.getElementById('frmProduct' + id).submit();
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