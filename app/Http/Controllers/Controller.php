<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Brand;
use App\Subbrand;
use App\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home()
    {
        $brands = Brand::orderBy('order')->get();
        return view('pages.home', compact('brands'));
    }

    public function regenerate()
    {
    	$output = $brandOutput = array();
    	$brands = Brand::all();
    	foreach ($brands as $brand) {
    		$brandOutput = array();
    		$categories = Category::where('brand_id', $brand->id)->get();
    		$subbrands = Subbrand::where('brand_id', $brand->id)->get();
    		foreach ($categories as $category) {
    			$categoryOutput = array();
    			foreach ($subbrands as $subbrand) {
    				$subbrandOutput = array();
					$hotels = Hotel::where(['subbrand_id' => $subbrand->id, 'category_id' => $category->id])->get();
					foreach ($hotels as $hotel) {
						$subbrandOutput[] = array($hotel->id, $hotel->latitude, $hotel->longitude);
					}
    				$categoryOutput[$subbrand->id] = $subbrandOutput;
    			}
    			$brandOutput[$category->id] = $categoryOutput;
    		}
    		$output[$brand->id] = $brandOutput;
    	}


    	Storage::disk('public')->put('maps.js', "var hotel_list = ".json_encode($output).";");
    	Storage::disk('public')->put('maps.gz', gzencode("var hotel_list = ".json_encode($output).";"));

    	/*
		$hotel_list_file_name = "../public/maps.js";
		$hotel_list_file = fopen($hotel_list_file_name, "w") or die("Unable to open file!");
		$js_hotel_list .= "var hotel_list = ".json_encode($output).";";

		fwrite($hotel_list_file, $js_hotel_list);
		fclose($hotel_list_file);
		$hotel_list_gzip_file_name = "../awardomatic_test/maps.gz";
		$hotel_list_gzip_file = gzopen ($hotel_list_gzip_file_name, 'w9');
		gzwrite ($hotel_list_gzip_file, file_get_contents($hotel_list_file_name));
		gzclose($hotel_list_gzip_file);
		*/

        return redirect(url("/admin/hotels"))->withSuccess("Hotel list has been regenerated successfully");
    }
    
}
