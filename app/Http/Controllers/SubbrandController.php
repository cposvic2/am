<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Subbrand;
use Illuminate\Http\Request;

class SubbrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Brand $brand)
    {
        $subbrands = Subbrand::where('brand_id', $brand->id)->orderBy('order')->get();
        return view('pages.admin.subbrands', compact('subbrands', 'brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        return response()->json([
            'success' => true,
            'view' => view('modals.category', compact('brands'))->render(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Brand $brand)
    {
        $subbrand = new Subbrand;
        $subbrand->brand_id = $brand->id;
        $subbrand->name = $request->input('name');
        $subbrand->order = $request->input('order');
        $subbrand->save();
        $subbrands = Subbrand::where([['brand_id', '=', $brand->id],['id', '<>', $subbrand->id]])->get();
        $i = 1;
        foreach ($subbrands as $otherSubbrand) {
            if ($subbrand->order == $i) {
                $i++;
            }
            $otherSubbrand->order = $i;
            $otherSubbrand->save();
            $i++;
        }
        return redirect(url("/admin/brands/{$brand->id}/subbrands"))->withSuccess($subbrand->name." has been added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand, Subbrand $subbrand)
    {
        $brands = Brand::all();
        return response()->json([
            'success' => true,
            'view' => view('modals.subbrand', compact('brands', 'subbrand'))->render(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand, Subbrand $subbrand)
    {
        $subbrand->name = $request->input('name');
        $subbrand->order = $request->input('order');
        $subbrand->save();
        $subbrands = Subbrand::where([['brand_id', '=', $brand->id],['id', '<>', $subbrand->id]])->orderBy('order')->get();
        $i = 1;
        foreach ($subbrands as $otherSubbrand) {
            if ($subbrand->order == $i) {
                $i++;
            }
            $otherSubbrand->order = $i;
            $otherSubbrand->save();
            $i++;
        }
        return redirect(url("/admin/brands/{$brand->id}/subbrands"))->withSuccess($subbrand->name." has been updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
