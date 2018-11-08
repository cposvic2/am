<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$brands = Brand::all();
        return view('pages.admin.brands', compact('brands'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return response()->json([
            'success' => true,
            'view' => view('modals.brand', compact('brand'))->render(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $brand->name = $request->input('name');
        $brand->order = $request->input('order');
        $brand->save();

        return redirect(url("/admin/brands"))->withSuccess($brand->name." has been updated successfully");
    }
}
