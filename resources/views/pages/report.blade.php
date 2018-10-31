@extends('layouts.app')

@section('title')
Report A Problem
@endsection

@section('content')
<div id="problemReport">
    <h2>Suggest changes for XXX</h2>
    <p>Is something not right? Please give us as much information you can on what's wrong.</p>
    <div class="comment-checkbox-container"><input type="checkbox" id="xne" value="xne" class="comment-checkbox"><label for="xne">This property doesn't exist</label></div>
    <div class="comment-box-container"><textarea class="comment-box" id="bne" placeholder="Please tell us if this property was closed and, if applicable, the name of the property currently at this location. If this property has moved, please tell us the new location." rows="3"></textarea></div>
    <div class="comment-checkbox-container"><input type="checkbox" id="xdu" value="xdu" class="comment-checkbox"><label for="xdu">This property is a duplicate</label></div>
    <div class="comment-box-container"><textarea class="comment-box" id="bdu" placeholder="Please share any details that would help us identify the other property." rows="3"></textarea></div>
    <div class="comment-checkbox-container"><input type="checkbox" id="xai" value="xai" class="comment-checkbox"><label for="xai">Address is incorrect</label></div>
    <div class="comment-box-container"><textarea class="comment-box" id="bai" placeholder="Please share any details that would help us determine the correct address for this property." rows="3"></textarea></div>
    <div class="comment-checkbox-container"><input type="checkbox" id="xwp" value="xwp" class="comment-checkbox"><label for="xwp">Property category or points required is incorrect</label></div>
    <div class="comment-box-container"><textarea class="comment-box" id="xwp" placeholder="Please share any details that would help us determine the correct category for this property." rows="3"></textarea></div>
    <div class="comment-checkbox-container"><input type="checkbox" id="xo" value="xo" class="comment-checkbox"><label for="xo">Other</label></div>
    <div class="comment-box-container"><textarea class="comment-box" id="bo" placeholder="Please provide specific details of the issue or problem as these will help us fix it." rows="3"></textarea></div>
    <div id="newMarkerLocation">
        Is the property not located correctly on the map? Grab the marker and move it to its correct location.
        <div id="problemReport-marker-map"></div>
        <input type="hidden" id="problemReportLat" name="problemReportLat" value="0">
        <input type="hidden" id="problemReportLong" name="problemReportLat" value="0">
    </div>
    <div class="property-container">
        <div class="property-header">Name</div>
        <div class="">{{ $hotel->name }}</div>
    </div>
    <div class="property-expand">
    	<div class="property-header">Name</div>
		<label for="nna">Property Name</label>
		<input type="text" class="full-width-input" id="nna" value="{{ $hotel->name }}">
    </div>
    <div class="property-container">
        <div class="property-header">Address</div>
        <div class="">{{ $hotel->address }}</div>
    </div>
    <div class="property-expand">
  		<div class="property-header">Address</div>
		<label for="nadd">Full Address</label>
		<input type="text" class="full-width-input" id="nadd" value="{{ $hotel->address }}">
    </div>
    <div class="property-container">
        <div class="property-header">Website</div>
        <div class="">{{ $hotel->link }}</div>
    </div>
    <div class="property-expand">
    	<div class="property-header">Website</div>
		<label for="nlink">URL</label>
		<input type="text" class="full-width-input" id="nlink" value="{{ $hotel->link }}">
    </div>
    <div class="property-container">
        <div class="property-header">Category &amp; Points</div>
        <div class=""><?php echo ($thisbrandarray["categorynames"][$i] ? $thisbrandarray["categorynames"][$category - 1] : 'Category ' . $category ) ?>, <?php echo $points ?> points</div>
    </div>
    <div class="property-expand">
   		<div class="property-header">Category & Points</div>
		<select id="ncat">
        <?php 
			foreach ( $thisbrandarray["categories"] as $key=>$eachcategory) {
				if ( $eachcategory == $category ) {
					echo '<option value="'. $eachcategory .'" selected>'. ($thisbrandarray["categorynames"][$i] ? $thisbrandarray["categorynames"][$key] : 'Category ' . $eachcategory ) .'</option>';
				} else {
					echo '<option value="'. $eachcategory .'">'. ($thisbrandarray["categorynames"][$i] ? $thisbrandarray["categorynames"][$key] : 'Category ' . $eachcategory ) .'</option>';
				}
			}
		 ?>
		</select>
        <label for="npo">Points</label>
		<input type="text" class="small-input" id="npo" value="{{ $hotel->points }}">
    </div>
    <div class="property-container">
        <div class="property-header">Brand</div>
        <div class="">{{ $hotel->subbrand->name }}, part of {{ $hotel->brand->name }}</div>
    </div>
    <div class="property-expand">
    	<div class="property-header">Brand</div>
		<label for="nbr">Brand</label>
        <select id="nbr">
        <?php 
			foreach ( $hotel_properties as $eachbrand) {
				if ( $eachbrand["brand"][1] == $brand ) {
					echo '<option value="'. $eachbrand["brand"][0] .'" selected>'.$eachbrand["brand"][1] .'</option>';
				} else {
					echo '<option value="'. $eachbrand["brand"][0] .'">'.$eachbrand["brand"][1] .'</option>';
				}
			}
		 ?>
		</select>
        <label for="nsub">Sub-brand</label>
		<select id="nsub">
        <?php 
			foreach ( $thisbrandarray["subbrands"] as $key=>$eachsubbrand) {
				if ( $eachsubbrand == $subbrand ) {
					echo '<option value="'. $thisbrandarray["subbrandsshort"][$key] .'" selected>'. $thisbrandarray["subbrands"][$key] .'</option>';
				} else {
					echo '<option value="'. $thisbrandarray["subbrandsshort"][$key] .'">'. $thisbrandarray["subbrands"][$key] .'</option>';
				}
			}
		 ?>
		</select>
    </div>
    <div class="submit-container">
        <div id="submit-status"></div>
    	<button class="btn-submit btn" id="submit">Submit</buttom><button class="btn-cancel btn" id="cancel">Cancel</buttom>
    </div>   
</div>
@endsection