<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Brand $brand)
    {
        $categories = Category::where('brand_id', $brand->id)->orderBy('order')->get();
        return view('pages.admin.categories',  compact('categories', 'brand'));
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
        $category = new Category;
        $category->brand_id = $brand->id;
        $category->name = $request->input('name');
        $category->order = $request->input('order');
        $category->points = $request->input('points');
        $category->save();
        $categories = Category::where([['brand_id', '=', $brand->id],['id', '<>', $category->id]])->get();
        $i = 1;
        foreach ($categories as $otherCategory) {
            if ($category->order == $i) {
                $i++;
            }
            $otherCategory->order = $i;
            $otherCategory->save();
            $i++;
        }
        return redirect(url("/admin/brands/{$brand->id}/categories"))->withSuccess($category->name." has been added successfully");
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
    public function edit(Brand $brand, Category $category)
    {
        $brands = Brand::all();
        return response()->json([
            'success' => true,
            'view' => view('modals.category', compact('brands', 'category'))->render(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand, Category $category)
    {
        $category->name = $request->input('name');
        $category->order = $request->input('order');
        $category->points = $request->input('points');
        $category->save();
        $categories = Category::where([['brand_id', '=', $brand->id],['id', '<>', $category->id]])->get();
        $i = 1;
        foreach ($categories as $otherCategory) {
            if ($category->order == $i) {
                $i++;
            }
            $otherCategory->order = $i;
            $otherCategory->save();
            $i++;
        }
        return redirect(url("/admin/brands/{$brand->id}/categories"))->withSuccess($category->name." has been updated successfully");
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
