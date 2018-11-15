<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\HotelRequest;
use App\HotelRequestIssue;
use Illuminate\Http\Request;

class HotelRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = HotelRequest::all();
        return view('pages.admin.requests', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $hotel_id)
    {
        $hotel = Hotel::findOrFail($hotel_id);
        $hotelRequest = new HotelRequest;

        $hotelRequest->hotel_id = $hotel->id;

        $hotelRequest->brand_id = $request->input('brand');
        $hotelRequest->subbrand_id = $request->input('subbrand');
        $hotelRequest->category_id = $request->input('category');
        $hotelRequest->points = $request->input('points');
        $hotelRequest->name = $request->input('name');
        $hotelRequest->address = $request->input('address');
        $hotelRequest->latitude = $request->input('latitude');
        $hotelRequest->longitude = $request->input('longitude');
        $hotelRequest->link = $request->input('link');
        $hotelRequest->completed = false;
        $hotelRequest->save();

        $possibleIssues = ["bne", "bdu", "bai", "bwp", "bo"];
        foreach ($possibleIssues as $i) {
            if ($request->input($i.'-check')) {
                $hotelRequestIssue = new HotelRequestIssue;
                $hotelRequestIssue->type = $i;
                $hotelRequestIssue->hotel_request_id = $hotelRequest->id;
                $hotelRequestIssue->description = $request->input($i.'-text');
                $hotelRequestIssue->save();
            }
        }
        

        return redirect(url("report/{$hotel->id}"))->withSuccess("Your hotel update request has been submitted");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(HotelRequest $request)
    {
        return view('pages.admin.request', compact('request'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
