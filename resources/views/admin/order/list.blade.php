@extends('admin.layouts.app')

@section('title', 'List Order Product - Shoes World Dashboard')

@section('content')
    <div class="container my-5">
        <div class="card shadow-xl border-0">
            <div class="card-header bg-gradient-to-r from-purple-500 via-pink-500 to-red-500 text-white">
                <div class="row">
                    <div class="col-12">
                        <h3 class="h5 pt-2">List of Order Products</h3>
                    </div>
                </div>
            </div>
            <div class="card-body bg-gray-50">
                <table class="table table-striped table-bordered shadow-sm">
                    <thead class="bg-info text-white">
                        <tr>
                            <th>ID</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Product Title</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Total Price</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($orders->isNotEmpty())
                            @foreach ($orders as $order)
                                <tr class="hover:bg-gray-100">
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->user->email }}</td>
                                    <td>{{ $order->product->title }}</td>
                                    <td>{{ $order->qty }}</td>
                                    <td>$ {{ number_format($order->product->price, 2) }}</td>
                                    <td>$ {{ number_format($order->qty * $order->product->price, 2) }}</td>
                                    <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d M, Y') }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8" class="text-center">No orders found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                <!-- Pagination Links -->
                <div class="d-flex justify-content-center mt-3">
                    {{ $orders->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
