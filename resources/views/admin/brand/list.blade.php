@extends('admin.layouts.app')

@section('title', 'List Brand - Shoes World Dashboard')

@section('content')
    <div class="container my-5">
        @if (Session::has('success'))
            <div class="alert alert-success my-3">{{ Session::get('success') }} </div>
        @endif

        <div class="card shadow-xl border-0">
            <div class="card-header bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-white">
                <div class="row">
                    <div class="col-10">
                        <h3 class="h5 pt-2">Brands List</h3>
                    </div>
                    <div class="col-2 text-end">
                        <a href="{{ route('brand.create') }}" class="btn btn-light rounded-pill px-4 py-2 shadow-lg">Create Brand</a>
                    </div>
                </div>
            </div>
            <div class="card-body bg-gray-50">
                <table class="table table-striped table-bordered shadow-sm">
                    <thead class="bg-info text-white">
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
                        @if ($brands->isNotEmpty())
                            @foreach ($brands as $brand)
                                <tr class="hover:bg-gray-100">
                                    <td>{{ $brand->id }}</td>
                                    <td>{{ $brand->name }}</td>
                                    <td>{{ Str::limit($brand->description, 50) }}</td>
                                    <td><span class="badge {{ $brand->status == 'Active' ? 'bg-success' : 'bg-secondary' }}">{{ $brand->status }}</span></td>
                                    <td>{{ \Carbon\Carbon::parse($brand->created_at)->format('d M, Y') }}</td>
                                    <td class="d-flex justify-content-start">
                                        <a href="{{ route('brand.edit', $brand->id) }}" class="btn btn-outline-warning me-2 rounded-pill">Edit</a>
                                        <a href="#" onclick="deleteBrand({{ $brand->id }})" class="btn btn-outline-danger rounded-pill">Delete</a>
                                        <form id="delete-brand-from-{{ $brand->id }}" action="{{ route('brand.destroy', $brand->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center">No brands found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                <!-- Pagination Links -->
                <div class="d-flex justify-content-center mt-3">
                    {{ $brands->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteBrand(id) {
            if (confirm('Are you sure you want to delete this brand?')) {
                document.getElementById("delete-brand-from-" + id).submit();
            }
        }
    </script>
@endsection
