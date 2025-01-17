<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ShoesController extends Controller
{
    public function index()
    {
        $latest_shoes = Product::with(['brand', 'category'])
            ->where('featured', false)
            ->where('status', 'active')
            ->limit(4) // Fetch the latest 4 products
            ->get();

        $featured_shoes = Product::with(['brand', 'category'])
            ->where('featured', true)
            ->where('status', 'active')
            ->limit(4) // Fetch the featured 4 products
            ->get();

        return view('welcome', compact('latest_shoes', 'featured_shoes'));
    }

    public function show($id)
    {
        // Fetch the product by ID along with its category and author using eager loading
        $product = Product::with(['category', 'brand'])->findOrFail($id);

        return view('product', compact('product'));
    }
}
