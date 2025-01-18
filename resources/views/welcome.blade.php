@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Limited Edition Section -->
        <div class="feature">
            <div class="container my-5">
                <h5 class="text-uppercase font-weight-bold text-info">Limited Edition Shoes</h5>
                <div class="row mt-4">
                    @if ($featured_shoes->isNotEmpty())
                        @foreach ($featured_shoes as $shoe)
                            <div class="col-md-3 mb-4">
                                <div class="card shadow-lg border-0 d-flex flex-column" style="height: 100%; border: 2px solid #17a2b8;">
                                    <img src="{{ asset('product/' . $shoe->img) }}" class="card-img-top"
                                        alt="{{ $shoe->title }}" style="height: 350px; object-fit: cover;">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title">{{ $shoe->title }}</h5>
                                        <p class="card-text">{{ Str::limit($shoe->description, 100) }}</p>
                                        <p><strong>Brand:</strong> {{ $shoe->brand->name }}</p>
                                        <p><strong>Category:</strong> {{ $shoe->category->name }}</p>
                                        <p><strong>Price:</strong> ${{ $shoe->price }}</p>
                                        <div class="d-flex justify-content-between mt-auto">
                                            <a href="{{ route('shoe.show', $shoe->id) }}" class="btn btn-outline-info mr-2" style="width: 48%;">View</a>
                                            <a href="{{ route('addtocart', $shoe->id) }}" class="btn btn-dark ml-2" style="width: 48%;">Add to Cart</a> <!-- Changed color to black -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <!-- Latest Shoes Section -->
        <div class="latest">
            <div class="container my-5">
                <h5 class="text-uppercase font-weight-bold text-warning">Latest Shoes</h5>
                <div class="row mt-4">
                    @if ($latest_shoes->isNotEmpty())
                        @foreach ($latest_shoes as $shoe)
                            <div class="col-md-3 mb-4">
                                <div class="card shadow-lg border-0 d-flex flex-column" style="height: 100%; border: 2px solid #ffc107;">
                                    <img src="{{ asset('product/' . $shoe->img) }}" class="card-img-top"
                                        alt="{{ $shoe->title }}" style="height: 350px; object-fit: cover;">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title">{{ $shoe->title }}</h5>
                                        <p class="card-text">{{ Str::limit($shoe->description, 100) }}</p>
                                        <p><strong>Brand:</strong> {{ $shoe->brand->name }}</p>
                                        <p><strong>Category:</strong> {{ $shoe->category->name }}</p>
                                        <p><strong>Price:</strong> ${{ $shoe->price }}</p>
                                        <div class="d-flex justify-content-between mt-auto">
                                            <a href="{{ route('shoe.show', $shoe->id) }}" class="btn btn-outline-info mr-2" style="width: 48%;">View</a>
                                            <a href="{{ route('addtocart', $shoe->id) }}" class="btn btn-dark ml-2" style="width: 48%;">Add to Cart</a> <!-- Changed color to black -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
