@extends('layouts.app')

@section('content')
    <div class="container">
        <p>This is home page</p>
        <div class="feature">
            <div class="container my-5">
                <h5>Limited Edition Shoes</h5>
                <div class="row mt-4">
                    @if ($featured_shoes->isNotEmpty())
                        @foreach ($featured_shoes as $shoe)
                            <div class="col-md-3 mb-4">
                                <div class="card" style="width: 18rem;">
                                    <img src="{{ asset('product/' . $shoe->img) }}" class="card-img-top"
                                        alt="{{ $shoe->title }}" style="height: 350px;">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $shoe->title }}</h5>
                                        <p class="card-text">{{ Str::limit($shoe->description, 100) }}</p>
                                        <p><strong>Brand:</strong> {{ $shoe->brand->name }}</p>
                                        <p><strong>Category:</strong> {{ $shoe->category->name }}</p>
                                        <p><strong>Price:</strong> ${{ $shoe->price }}</p>
                                        <a href="{{ route('shoe.show', $shoe->id) }}" class="btn btn-info w-100">View</a>
                                        <a href="{{ route('addtocart', $shoe->id) }}" class="btn btn-primary w-100 mt-3">Add to
                                            cart</a>

                                    </div>
                                </div>
                        @endforeach
                    @endif


                </div>
            </div>
        </div>

        <div class="latest">
            <div class="container my-5">
                <h5>latest Shoes</h5>
                <div class="row mt-4">
                    @if ($latest_shoes->isNotEmpty())
                        @foreach ($latest_shoes as $shoe)
                            <div class="col-md-3 mb-4">
                                <div class="card" style="width: 18rem;">
                                    <img src="{{ asset('product/' . $shoe->img) }}" class="card-img-top"
                                        alt="{{ $shoe->title }}" style="height: 350px;">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $shoe->title }}</h5>
                                        <p class="card-text">{{ Str::limit($shoe->description, 100) }}</p>
                                        <p><strong>Brand:</strong> {{ $shoe->brand->name }}</p>
                                        <p><strong>Category:</strong> {{ $shoe->category->name }}</p>
                                        <p><strong>Price:</strong> ${{ $shoe->price }}</p>
                                        <a href="{{ route('shoe.show', $shoe->id) }}" class="btn btn-info w-100">View</a>
                                        <a href="{{ route('addtocart', $shoe->id) }}" class="btn btn-primary w-100 mt-3">Add to
                                            cart</a>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif


                </div>
            </div>
        </div>

    </div>
    </div>

@endsection
