@extends('admin.layouts.app')

@section('title', 'List Category - Shoes World Dashboard')

@section('content')
    <div class="container my-5">
        @if (Session::has('success'))
            <div class="alert alert-success my-3">{{ Session::get('success') }} </div>
        @endif

        <div class="card shadow-xl border-0">
            <div class="card-header bg-gradient-to-r from-purple-500 via-pink-500 to-red-500 text-white">
                <div class="row">
                    <div class="col-10">
                        <h3 class="h5 pt-2">Categories List</h3>
                    </div>
                    <div class="col-2 text-end">
                        <a href="{{ route('category.create') }}" class="btn btn-light rounded-pill px-4 py-2 shadow-lg">Create Category</a>
                    </div>
                </div>
            </div>
            <div class="card-body bg-gray-50">
                <table class="table table-striped table-bordered shadow-sm">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($categories->isNotEmpty())
                            @foreach ($categories as $category)
                                <tr class="hover:bg-gray-100">
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ Str::limit($category->description, 50) }}</td>
                                    <td><span class="badge {{ $category->status == 'Active' ? 'bg-success' : 'bg-secondary' }}">{{ $category->status }}</span></td>
                                    <td>{{ \Carbon\Carbon::parse($category->created_at)->format('d M, Y') }}</td>
                                    <td class="d-flex justify-content-start">
                                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-outline-warning me-2 rounded-pill">Edit</a>
                                        <a href="#" onclick="deleteCategory({{ $category->id }})" class="btn btn-outline-danger rounded-pill">Delete</a>
                                        <form id="delete-category-from-{{ $category->id }}" action="{{ route('category.destroy', $category->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center">No categories found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                <!-- Pagination Links -->
                <div class="d-flex justify-content-center mt-3">
                    {{ $categories->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteCategory(id) {
            if (confirm('Are you sure you want to delete this category?')) {
                document.getElementById("delete-category-from-" + id).submit();
            }
        }
    </script>
@endsection
