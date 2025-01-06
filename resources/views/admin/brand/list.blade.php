@extends('admin.layouts.app')

@section('title', 'List Brand - Shoes World Dashboard')

@section('content')
    <div class="container">
        @if (Session::has('success'))
            <div class="alert alert-success my-3">{{ Session::get('success') }} </div>
        @endif
        <div class="card border-0 shadow my-5">
            <div class="card-header bg-light">
                <div class="row">
                    <div class="col-10">
                        <h3 class="h5 pt-2">List of Brands:</h3>
                    </div>
                    <div class="col-2">
                        <div>
                            <a href="{{ route('brand.create') }}" class="btn btn-primary">Create Brand</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                    @if ($brands->isNotEmpty())
                        @foreach ($brands as $brand)
                            <tr>
                                <td>{{ $brand->id }}</td>
                                <td>{{ $brand->name }}</td>
                                <td>{{ $brand->description }}</td>
                                <td>{{ $brand->status }}</td>
                                <td>{{ \Carbon\Carbon::parse($brand->created_at)->format('d M, Y') }}</td>
                                <td>
                                    <a href="{{ route('brand.edit', $brand->id) }}" class="btn btn-dark">Edit</a>
                                    <a href="#" onclick="deleteCategory({{ $brand->id }})" class="btn btn-danger">Delete</a>
                                    <form id="delete-brand-from-{{ $brand->id }}" action="{{ route('brand.destroy', $brand->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>                                
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">No brands found.</td>
                        </tr>
                    @endif
                </table>
                <!-- Pagination Links -->
                <div class="d-flex justify-content-center">
                    {{ $brands->links('pagination::bootstrap-4') }}
                </div>
            </div>

        </div>
    </div>

    <script>
        function deleteCategory(id) {
            if (confirm('Are you sure you want to delete this brand?')) {
                document.getElementById("delete-brand-from-" + id).submit();
            }
        }
    </script>    

@endsection

