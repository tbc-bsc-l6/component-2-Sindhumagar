<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class SearchProductController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('search_term');
        $categoryId = $request->input('category_id');
        $brandId = $request->input('brand_id');

        $products = product::with(['category', 'brand'])
            ->where('status', 'active') 
            ->when($searchTerm, function ($query, $searchTerm) {
                return $query->where('title', 'like', '%' . $searchTerm . '%')
                    ->orWhere('description', 'like', '%' . $searchTerm . '%');
            })
            ->when($categoryId, function ($query, $categoryId) {
                return $query->where('category_id', $categoryId);
            })
            ->when($brandId, function ($query, $brandId) {
                return $query->where('brand_id', $brandId);
            })
            ->paginate(8);

        $categories = category::where('status', 'active')->get(); 
        $brands = brand::where('status', 'active')->get();
        
        return view('viewAllShoes', compact('products', 'categories', 'brands', 'searchTerm', 'categoryId', 'brandId'));
    }
}
