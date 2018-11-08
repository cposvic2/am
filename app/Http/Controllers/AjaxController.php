<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Subbrand;
use App\Category;
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
}
