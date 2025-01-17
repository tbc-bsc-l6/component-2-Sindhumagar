@extends('layouts.app')

@section('content')

<div class="container my-4">
    <h1>Shoes</h1>

    <form method="GET" action="{{ route('shoes.index') }}" class="my-4">
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="search_term" class="form-control" placeholder="Search..." value="{{ old('search_term', $searchTerm) }}">
            </div>
            <div class="col-md-3">
                <select name="category_id" class="form-control">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == old('category_id', $categoryId) ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select name="brand_id" class="form-control">
                    <option value="">Select Brand</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}" {{ $brand->id == old('brand_id', $brandId) ? 'selected' : '' }}>
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary ">Search</button>
            </div>
        </div>
    </form>

    @if($products->count() > 0)
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-3 mb-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('product/' . $product->img) }}" class="card-img-top"
                        alt="{{ $product->title }}" style="height: 350px;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->title }}</h5>
                        <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                        <p><strong>Brand:</strong> {{ $product->brand->name }}</p>
                        <p><strong>Category:</strong> {{ $product->category->name }}</p>
                        <p><strong>Price:</strong> ${{ $product->price }}</p>
                        <a href="{{ route('shoe.show', $product->id) }}" class="btn btn-info w-100">View</a>
                        <a href="{{ route('addtocart', $product->id) }}" class="btn btn-primary w-100 mt-3">Add to cart</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="pagination">
            {{ $products->links('pagination::bootstrap-4') }}
        </div>
    @else
        <p>No products found matching your criteria.</p>
    @endif
</div>

@endsection