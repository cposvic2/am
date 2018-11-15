<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Brand;
use App\HotelRequestIssue;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class HotelController extends Controller
{
    public function report($id)
    {
        $issue = new HotelRequestIssue;
        $hotel = Hotel::findOrFail($id);
        $brands = Brand::all();
        return view('pages.report', compact('brands', 'hotel', 'issue'));
    }

    public function infobox($id)
    {
    	$hotel = Hotel::findOrFail($id);
        $brands = Brand::all();
        return response()->json([
            'success' => true,
            'view' => view('modals.infobox', compact('hotel', 'brands'))->render(),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Hotel::query();

        $querystringArray = Input::only(['brand','subbrand','category','search']);

        if (Input::get('brand', '') != '') {
            $query->where('brand_id', Input::get('brand'));
        }
        if (Input::get('subbrand', '') != '') {
            $query->where('subbrand_id', Input::get('subbrand'));
        }
        if (Input::get('category', '') != '') {
            $query->where('category_id', Input::get('category'));
        }
        if (Input::get('search', '') != '') {
            $query->where('name', 'like', '%'.Input::get('search').'%');
        }
        $hotels = $query->paginate(20);
        $brands = Brand::all();

        $hotels->appends($querystringArray);

        return view('pages.admin.hotels', compact('hotels', 'brands'));
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
            'view' => view('modals.hotel', compact('brands'))->render(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hotel = new Hotel;

        $hotel->brand_id = $request->input('brand');
        $hotel->subbrand_id = $request->input('subbrand');
        $hotel->category_id = $request->input('category');

        $hotel->name = $request->input('name');
        $hotel->address = $request->input('address');
        $hotel->link = $request->input('link');

        $hotel->latitude = $request->input('latitude');
        $hotel->longitude = $request->input('longitude');
        $hotel->save();

        return redirect(url("/admin/hotels"))->withSuccess($hotel->name." has been added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        $brands = Brand::all();
        return view('pages.admin.hotel', compact('hotel', 'brands'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        $brands = Brand::all();
        return view('pages.admin.hotel', compact('hotel', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        $hotel->brand_id = $request->input('brand');
        $hotel->subbrand_id = $request->input('subbrand');
        $hotel->category_id = $request->input('category');

        $hotel->name = $request->input('name');
        $hotel->address = $request->input('address');
        $hotel->link = $request->input('link');
        $hotel->display = $request->input('display') ? true : false;

        $hotel->latitude = $request->input('latitude');
        $hotel->longitude = $request->input('longitude');
        $hotel->save();

        return redirect(url("/admin/hotels"))->withSuccess($hotel->name." has been updated successfully");
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
