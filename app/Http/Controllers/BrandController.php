<?php

namespace App\Http\Controllers;

use App\Models\brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    //
     //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = brand::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.brand.list', [
            'brands' => $brands
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validator
        $rules = [
            'name' => 'required|min:5',
            'description' => 'required|min:10',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('brand.create')->withInput()->withErrors($validator);
        }

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->status = $request->has('status') ? 'active' : 'inActive';

        $brand->save();

        return redirect()->route('brand.index')->with('success', 'Brand Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', [
            'brand' => $brand
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);

        // Validator
        $rules = [
            'name' => 'required|min:5',
            'description' => 'required|min:10',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('brand.edit', $brand->id)->withInput()->withErrors($validator);
        }

        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->status = $request->has('status') ? 'active' : 'inActive';

        $brand->save();

        return redirect()->route('brand.index')->with('success', 'Brand updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return redirect()->route('brand.index')->with('success', 'Brand Deleted Successfully');

    }
}
