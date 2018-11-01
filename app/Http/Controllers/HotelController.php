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
}
