@extends('layouts.app')

@section('content')
<div class="container">

    <div>
        <div class="row my-5">
            <div class="col-md-4">
                <img src="{{ asset('product/' . $product->img) }}" class="card-img-top" alt="{{ $product->title }}"
                    style="height: auto; width:100%">
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-6">
                <h1>{{ $product->title }}</h1>
                <p>Description: {{ $product->description }}</p>
                <h4><strong>Category:</strong> {{ $product->category->name }}</h4>
                <p>{{ $product->category->description }}</p>
                <h4><strong>Brand:</strong> {{ $product->brand->name }}</h4>
                <p><Strong>Description:</Strong><br>
                    {{ $product->brand->description }}</p>
                <h5>Price: {{ $product->price }}</h5>
                <a href="{{ route('addtocart', $product->id) }}" class="btn btn-primary w-100">Add to cart</a>


            </div>
        </div>
    </div>

</div>

@endsection