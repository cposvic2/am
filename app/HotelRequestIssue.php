<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelRequestIssue extends Model
{
	public $types = ["bne", "bdu", "bai", "bwp", "bo"];
	public $placeholders = [
		"bne" => "Please describe if this property was closed and, if applicable, the name of the property currently at this location. If this property has moved, please describe the new location.",
		"bdu" => "Please share any details that would help identify the other property.",
		"bai" => "Please share any details that would help determine the correct address for this property.",
		"bwp" => "Please share any details that would help determine the correct category for this property.",
		"bo" => "Please provide specific details of the issue or problem as these will help fix it.",

	];
	public $descriptions = [
		"bne" => "This property doesn't exist",
		"bdu" => "This property is a duplicate",
		"bai" => "Address is incorrect",
		"bwp" => "Property category or points required is incorrect",
		"bo" => "Other",

	];
    public function request() {
        return $this->belongsTo('App\HotelRequest', 'hotel_request_id');
    }
}
