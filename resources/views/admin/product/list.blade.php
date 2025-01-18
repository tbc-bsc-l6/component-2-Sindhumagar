@extends('admin.layouts.app')

@section('title', 'List Product - Shoes World Dashboard')

@section('content')
    <div class="container my-5">
        @if (Session::has('success'))
            <div class="alert alert-success my-3">{{ Session::get('success') }}</div>
        @endif

        <div class="card shadow-xl border-0">
            <div class="card-header bg-gradient-to-r from-blue-500 via-teal-500 to-green-500 text-white">
                <div class="row">
                    <div class="col-10">
                        <h3 class="h5 pt-2">Products List</h3>
                    </div>
                    <div class="col-2 text-end">
                        <a href="{{ route('product.create') }}" class="btn btn-light rounded-pill px-4 py-2 shadow-lg">Create Product</a>
                    </div>
                </div>
            </div>
            <div class="card-body bg-gray-50">
                <table class="table table-striped table-bordered shadow-sm">
                    <thead class="bg-info text-white">
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Price</th>
                            <th>Featured</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($products->isNotEmpty())
                            @foreach ($products as $product)
                                <tr class="hover:bg-gray-100">
                                    <td>{{ $product->id }}</td>
                                    <td>
                                        @if ($product->img)
                                            <img src="{{ asset('product/' . $product->img) }}" alt="{{ $product->title }}" class="img-thumbnail" style="max-width: 100px;">
                                        @else
                                            <span>No Image</span>
                                        @endif
                                    </td>
                                    <td>{{ $product->title }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->brand->name }}</td>
                                    <td>${{ number_format($product->price, 2) }}</td>
                                    <td><span class="badge {{ $product->featured ? 'bg-success' : 'bg-secondary' }}">{{ $product->featured ? 'Yes' : 'No' }}</span></td>
                                    <td><span class="badge {{ $product->status == 'active' ? 'bg-success' : 'bg-warning' }}">{{ ucfirst($product->status) }}</span></td>
                                    <td class="d-flex justify-content-start">
                                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-outline-warning me-2 rounded-pill">Edit</a>
                                        <a href="#" onclick="deleteProduct({{ $product->id }})" class="btn btn-outline-danger rounded-pill">Delete</a>
                                        <form id="delete-product-form-{{ $product->id }}" action="{{ route('product.destroy', $product->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="9" class="text-center">No products found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                <!-- Pagination Links -->
                <div class="d-flex justify-content-center mt-3">
                    {{ $products->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteProduct(id) {
            if (confirm('Are you sure you want to delete this product?')) {
                document.getElementById("delete-product-form-" + id).submit();
            }
        }
    </script>
@endsection
