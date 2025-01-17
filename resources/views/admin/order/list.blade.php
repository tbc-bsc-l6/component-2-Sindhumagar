@extends('admin.layouts.app')

@section('title', 'List Order Product - Shoes World Dashboard')

@section('content')
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-header bg-light">
                <div class="row">
                    <div class="col-10">
                        <h3 class="h5 pt-2">List of Order Products:</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
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
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->user->email }}</td>
                                    <td>{{ $order->product->title }}</td>
                                    <td>{{ $order->qty }}</td>
                                    <td>$ {{ $order->product->price }}</td>
                                    <td>$ {{ $order->qty * $order->product->price }}</td>
                                    <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d M, Y') }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10">No products found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <!-- Pagination Links -->
                <div class="d-flex justify-content-center">
                    {{ $orders->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection