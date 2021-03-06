<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Brand;
use App\Subbrand;
use App\Category;
use App\HotelRequest;
use App\HotelRequestIssue;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    /**
     * Populates select boxes.
     *
     * @return \Illuminate\Http\Response
     */
    public function select(Request $request)
    {
        switch ($request->input('action')) {
            case 'subbrand':
                $things = Subbrand::where('brand_id', $request->input('id'))->get();
                break;
            case 'category':
                $things = Category::where('brand_id', $request->input('id'))->get();
                break;
            default:
                $things = array();
                break;
        }
        $default = null;

        return response()->json([
            'success' => true,
            'view' => view('components.options', compact('things'))->render(),
        ]);
    }

    /**
     * Populates report modal.
     *
     * @return \Illuminate\Http\Response
     */
    public function report($id)
    {
        $issue = new HotelRequestIssue;
        $hotel = Hotel::findOrFail($id);
        $brands = Brand::all();
        return response()->json([
            'success' => true,
            'view' => view('modals.report', compact('brands', 'hotel', 'issue'))->render(),
        ]);
    }

    /**
     * Submits report modal.
     *
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

        $title = "Thank you";
        $content = "Your report was submitted successfully!";
        return response()->json([
            'success' => true,
            'view' => view('modals.alert', compact('title', 'content'))->render(),
        ]);
    }
}
