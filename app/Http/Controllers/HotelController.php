<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Brand;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function report($id)
    {
        return view('pages.report', ['hotel' => Hotel::findOrFail($id), 'brands' => Brand::all()]);
    }

    public function infobox($id)
    {
    	$hotel = Hotel::findOrFail($id);
        $brands = Brand::all();
        return response()->json([
            'success' => true,
            'view' => view('modals.infobox', ['hotel' => $hotel, 'brands' => $brands])->render(),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        $hotels = Hotel::all();
        return view('pages.admin.hotels', ['hotels' => $hotels, 'brands' => $brands]);
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
            'view' => view('modals.hotel', ['brands' => $brands])->render(),
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
        //
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
    public function edit(Hotel $hotel)
    {
        $brands = Brand::all();
        return response()->json([
            'success' => true,
            'view' => view('modals.hotel', ['brands' => $brands, 'hotel' => $hotel])->render(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
