@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-header bg-light">
                <div class="row">
                    <div class="col-10">
                        <h3 class="h5 pt-2">Order Product:</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Total Price</th>
                        <th>Created At</th>
                    </tr>
                    @if ($orders->isNotEmpty())
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>
                                    @if ($order->product->img)
                                        <img src="{{ asset('product/' . $order->product->img) }}"
                                            alt="{{ $order->product->title }}" class="img-thumbnail"
                                            style="max-width: 100px;">
                                    @else
                                        <span>No Image</span>
                                    @endif
                                </td>
                                <td>{{ $order->product->title }}</td>
                                <td>{{ $order->qty }}</td>
                                <td>$ {{ $order->product->price }}</td>
                                <td>$ {{ $order->qty * $order->product->price }}</td>
                                <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d M, Y') }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">No Product found.</td>
                        </tr>
                    @endif
                </table>



                <!-- Pagination Links -->
                <div class="d-flex justify-content-center">
                    {{ $orders->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

@endsection
