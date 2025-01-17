<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with(['category', 'brand'])->orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.product.list', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = brand::all();
        return view('admin.product.create', [
            'categories' => $categories,
            'brands' => $brands
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // Validator
        $rules = [
            'title' => 'required|min:5',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|min:10',
            'img' => 'required|mimes:jpeg,jpg,png,gif,svg|max:10000',
            'price' => 'required|numeric|min:0'
        ];
        
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            dd($validator->errors());
            return redirect()->route('product.create')->withInput()->withErrors($validator);
        }
        
        // Handle file upload
        $imageName = time().'.'.request()->img->getClientOriginalExtension();
        request()->img->move(public_path('product'), $imageName);
        
        $product = new Product();
        $product->title = $request->title;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->img = $imageName;
        $product->price = $request->price;
        $product->featured = $request->has('featured') ? '1' : '0';
        $product->status = $request->has('status') ? 'active' : 'inActive';

        $product->save();

        return redirect()->route('product.index')->with('success', 'Product Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::with(['category', 'brand'])->findOrFail($id);
        return view('admin.product.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = category::all();
        $brands = brand::all();
        return view('admin.product.edit', [
            'product' => $product,
            'categories' => $categories,
            'brands' => $brands
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Validator
        $rules = [
            'title' => 'required|min:5',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|min:10',
            'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric|min:0'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('product.edit', $product->id)->withInput()->withErrors($validator);
        }

        if ($request->hasFile('img')) {
            $imageName = time().'.'.request()->img->getClientOriginalExtension();
            request()->img->move(public_path('product'), $imageName);
            $product->img = $imageName;
        }

        $product->title = $request->title;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->featured = $request->has('featured') ? '1' : '0';
        $product->status = $request->has('status') ? 'active' : 'inActive';

        $product->save();

        return redirect()->route('product.index')->with('success', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = product::findOrFail($id);
    
        // Delete the image from the storage
        $imagePath = public_path('product/' . $product->img);
        if (file_exists($imagePath)) {
            unlink($imagePath); // Unlink the image file
        }
    
        // Delete the product from the database
        $product->delete();
    
        return redirect()->route('product.index')->with('success', 'Product Deleted Successfully');
    }
}
