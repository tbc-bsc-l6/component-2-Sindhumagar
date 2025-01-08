<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ShoesController extends Controller
{
    public function index()
    {
        $latest_shoes = Product::with(['brand', 'category'])
            ->where('featured', true)
            ->where('status', 'active')
            ->orderBy('published_at', 'desc')
            ->limit(4) // Fetch the latest 4 products
            ->get();

        $featured_shoes = Product::with(['brand', 'category'])
            ->where('featured', true)
            ->where('status', 'active')
            ->orderBy('published_at', 'desc')
            ->limit(4) // Fetch the featured 4 products
            ->get();

        return view('welcome', compact('latest_shoes', 'featured_shoes'));
    }
}
