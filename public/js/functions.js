var map;
var ProblemMap;

function UpdatePositions() {
	//var start = new Date().getTime();
	var i = markers.length;
	while (i--) {
		if ( map.getBounds().contains( markers[i].getPosition() ) ) {
			if ( !markers[i].getMap() ) {
				AddMarker(i);
			}			
		} else {
			if ( markers[i].getMap() ) {
				RemoveMarker(i);
			}
		}
	}
	//var end = new Date().getTime();
	//var time = end - start;
	//console.log(time);
	$.cookie('LatCookie', map.getCenter().lat() , { expires: 7 });
	$.cookie('LongCookie', map.getCenter().lng() , { expires: 7 });
	$.cookie('zoomCookie', map.getZoom(), { expires: 7 });
	if (typeof ga == 'function') { 
		ga('send', 'event', 'Awardomatic', 'Map Moved');
	}
}

function InitializeMarkers() {
	for (var brand in hotel_list) {
		if (hotel_list.hasOwnProperty(brand)) {
			var i = hotel_list[brand].length;
			while (i--) {
				if (typeof hotel_brands[brand]['categories'][hotel_list[brand][i][2]] != 'undefined' ) {
					var points = hotel_brands[brand]['categories'][hotel_list[brand][i][2]]['points'];
				} else {
					var points = null;
				}
				CreateMarker(hotel_list[brand][i][0], hotel_list[brand][i][1], hotel_list[brand][i][2], points, brand, hotel_list[brand][i][3], hotel_list[brand][i][4]);
			}
		}
	}	

	hotel_list = null;
}

function CreateMarker(lat, long, cat, points, brand, subbrand, id) {
	var i = markers.length;
	markers[i] = (new google.maps.Marker({
		position: new google.maps.LatLng(lat, long),
		category: cat,
		pointsamount: points,
		brand: brand,
		subbrand: subbrand,
		id: id,
		//map: map,
		icon: markerImages[brand],
		draggable: false,
	}));
	
	google.maps.event.addListener(markers[i], 'click', function() {
		MarkerClick(markers[i]);
	});
}

function MarkerClick(marker) {
	var id = marker.id;
	console.log(id);
	$.ajax({
		url: "infoboxquery",
		dataType: 'json',
		data: {"id":id},
		timeout: 0,
		error: function(jqXHR, textStatus, errorThrown) {
			console.log(textStatus);
		}
	})
	.done(function( json ) {
		var infoboxhotel = json["results"]["hotel"];
		var brand = infoboxhotel["br"];
		var category = infoboxhotel["ca"];
		
		if (typeof hotel_brands[brand]['categories'][category]['label'] != 'undefined' ) {
			var categorytoshow = hotel_brands[brand]['categories'][category]['label'];
		} else {
			var categorytoshow = "Category " + category;
		}

		if (typeof hotel_brands[brand]['categories'][category]['points'] != 'undefined' ) {
			var points = hotel_brands[infoboxhotel["br"]]['categories'][category]['points'];
			var pointstype = hotel_brands[infoboxhotel["br"]]['brand'][1];
			var pointstext = ', '+points+' '+pointstype;
		} else {
			var pointstext = '';
		}

		var action = "ga('send', 'event', 'Awardomatic', 'Link Clicked - "+brand+"')";

		var contentString = '<div class="noscrollbar"><h3 id="firstHeading" class="firstHeading"><a style="display:inline !important;" href="'+infoboxhotel["li"]+'" target="_blank" onclick="'+action+'", "'+infoboxhotel["na"]+'"]);">'+infoboxhotel["na"]+'</a></h3>';
		contentString += '<div id="bodyContent"><p>'+infoboxhotel["ad"]+'</p><p>'+categorytoshow+pointstext+'<span><a class="problem-report-link" href="report?id='+id+'" target="_blank">Not right?</a></span></p></div></div>';

		infowindow.setContent(contentString);
		infowindow.open(map,marker);
	});
}

function AddMarker(i) {
	markers[i].setMap(map);

	if (!MarkerShouldBeVisible(i)) {
		markers[i].setVisible(false);
	}	
}

function RemoveMarker(i) {
	markers[i].setMap(null);
}

function BrandIsSelected(i) {
	if (currentpreferences[markers[i].brand][0]) {
		return true;
	} else {
		return false;
	}
}

function CategoryIsSelected(i) {
	if (currentpreferences[markers[i].brand][1][markers[i].category - 1]) {
		return true;
	} else {
		return false;
	}
}

function PointsAreWithinBounds(i) {
	if ( markers[i].pointsamount == null || (minpoints <= markers[i].pointsamount && maxpoints >= markers[i].pointsamount) ) {
		return true;
	} else {
		return false;
	}
}

function SubBrandIsSelected(i) {
	if ( currentpreferences[markers[i].brand][2][markers[i].subbrand] || markers[i].subbrand == null ) {
		return true;
	} else {
		return false;
	}
}

function MarkerShouldBeVisible(i) {
	if ( BrandIsSelected(i) ) {
		if ( CategoryIsSelected(i) ) {
			if ( PointsAreWithinBounds(i) ) {
				if ( SubBrandIsSelected(i) ) {
					return true;
				} else {
					return false;
				}
			} else {
				return false
			}
		} else {
			return false
		}
	} else {
		return false;
	}
}

function displayChecks() {
	//check if markers should be displayed

	var MarkersKeys = Object.keys(markers);
	var i = MarkersKeys.length;
	while (i--) {
		if( MarkerShouldBeVisible(MarkersKeys[i]) ) {
			if( !markers[MarkersKeys[i]].visible )
				markers[MarkersKeys[i]].setVisible(true);
		} else if ( markers[MarkersKeys[i]].visible ) {
			markers[MarkersKeys[i]].setVisible(false);
		}
	}
}

function preferencesChanged() {
	collectPreferences();
	displayChecks();
}

function collectPreferences() {
	//collect preferences of hotels
	currentpreferences = [];

	for (var brand in hotel_brands) {
		if (hotel_brands.hasOwnProperty(brand)) {

			var brandgroup = [$('div input[name="hotelBrand"][id="'+brand+'"]').prop('checked')];
			var brandcategories = [];
			var subbrands = [];
			
			$('div input[name="' +brand+ 'category"]').each(function(){
				brandcategories.push($(this).prop('checked'));
			});
			brandgroup.push(brandcategories);
			
			$('div input[name="'+brand+'brand"]').each(function(){
				subbrands[$(this).attr('id')] = $(this).prop('checked');
			});
			brandgroup.push(subbrands);
			currentpreferences[brand] = brandgroup;
		}
	}

	if (typeof ga == 'function') { 
		ga('send', 'event', 'Awardomatic', 'Preferences Changed');
	}
}

$(document).ready(function(){
	ga('send', 'pageview');
	minpoints = 0;
	maxpoints = 100000;
	collectPreferences();

	$('input[name="hotelBrand"], .suboption-input input').change(function(){
		preferencesChanged()
	});

	$('input[name="all-selector"]').change(function(){
		var $allSelector = $(this);
		$allSelector.closest('div.suboption-section').find('.suboption-input input').each(function(){
			$(this).prop('checked', $allSelector.prop('checked') );
		});
		preferencesChanged()
	});

	$(".new-expand").click(function () {
		var $expander = $(this);
		$expander.toggleClass( "fa-minus-circle" );
		$expander.toggleClass( "fa-plus-circle" );
		
		var $expander_parent = $expander.closest('.brand-header');
		var $content = $expander.closest('.brand-header').next();

		if ( $expander.hasClass( "fa-minus-circle" ) ) {
			//$content.slideToggle(250);
			$content.addClass( "expanded" );
		} else {
			//$content.slideToggle(250);
			$content.removeClass( "expanded" );
		}
	});

	$(".menu-expand").click(function () {
		$('#points-slider, #hotel-brand').toggleClass( "expanded" );
	});

	$("#search input").click(function () {	
			$(this).animate({width: "240px" }, 200);
			if (typeof ga == 'function') { 
				ga('send', 'event', 'Awardomatic', 'Search Used');
			}
	})
	.focusout(function() {
		if( !$(this).val() ) {
			$(this).animate({width: "110px" }, 200);
		}
	});
	var windowHeight = $( window ).height()
	$('#hotel-brand').css('max-height', windowHeight - 180 );
});

$(window).resize(function() { 
	var windowHeight = $( window ).height()
	$('#hotel-brand').css('max-height', windowHeight - 180 );
}); 

$(function() {
	var maxslider = 100;
	$( "#slider-range" ).slider({
		range: true,
		min: 0,
		max: maxslider,
		
		values: [ 0, 100],
		slide: function( event, ui ) {
	
			minpoints = Math.ceil( ui.values[ 0 ] * 1000 );
			maxpoints = Math.ceil( ui.values[ 1 ] * 1000 );
			$( "#amount" ).text( minpoints + " - " + maxpoints + ' points');
			$('input#rangelow').val( minpoints );
			$('input#rangehigh').val( maxpoints );
			displayChecks()
			if (typeof ga == 'function') { 
				ga('send', 'event', 'Awardomatic', 'Slider Used');
			}
		}
	});
});

function initialize() {

	// get cookies

	var LatLong = [38,-95, 4];
	if( typeof $.cookie('LatCookie')!='undefined' && typeof $.cookie('LongCookie')!='undefined' && typeof $.cookie('zoomCookie')!='undefined' ) {
		if($.cookie('LatCookie') <= 90 && $.cookie('LatCookie') >= -90 && $.cookie('LongCookie') <= 180 && $.cookie('LongCookie') >= -180 && $.cookie('zoomCookie') >= 3 && $.cookie('zoomCookie') <= 20) {
			LatLong = [ $.cookie('LatCookie'),$.cookie('LongCookie'), parseInt($.cookie('zoomCookie')) ];
		}
	}

	infowindow = new google.maps.InfoWindow({
		maxWidth: 800,
		pixelOffset: new google.maps.Size(-1, 0)
	});

	markerImages = [];
	
	for (var brand in hotel_brands) {
		if (hotel_brands.hasOwnProperty(brand)) {
			markerImages[brand] = {
				url: "img/marker-sprite-2x.png",
				size: new google.maps.Size(14, 27),
				scaledSize: new google.maps.Size(98, 27),
				origin: new google.maps.Point(hotel_brands[brand]['brand'][2]*14,0),
				anchor: new google.maps.Point(7, 25)
			};
		}
	}

	markers = [];

	var featureOpts = [
		{
			"featureType": "water",
			"elementType": "labels",
			"stylers": [
				{ "visibility": "off" }
			]
		},{
			"featureType": "administrative",
			"elementType": "labels",
			"stylers": [
				{ "visibility": "on" }
			]
		},{	
			"featureType": "poi",
			"elementType": "labels",
			"stylers": [
				{ "visibility": "off" }
			]
		}
	]

	var styledMapOptions = {
		name: 'Custom Style'
	};

	var MY_MAPTYPE_ID = 'custom_style';

	var mapOptions = {
		zoom: LatLong[2],
		minZoom: 3,
		disableDefaultUI: true,
		zoomControl: true,
		zoomControlOptions: {
			style:google.maps.ZoomControlStyle.SMALL,
			position: google.maps.ControlPosition.RIGHT_BOTTOM
		},
		center: new google.maps.LatLng(LatLong[0], LatLong[1]),
		mapTypeControlOptions: {
			mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]
		},
		mapTypeId: MY_MAPTYPE_ID
	};

	map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

	var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);
	map.mapTypes.set(MY_MAPTYPE_ID, customMapType);

	var input = $('#search input')[0];
	var autocomplete = new google.maps.places.Autocomplete(input);

	InitializeMarkers();

	google.maps.event.addListener(autocomplete, 'place_changed', function() {
		infowindow.close();
		var place = autocomplete.getPlace();
		if (place.geometry.viewport) {
			map.fitBounds(place.geometry.viewport);
		} else if(place.geometry.location) {
			map.setZoom(12);
			map.setCenter(place.geometry.location);
		}
	});

	google.maps.event.addListener(map, 'idle', function(){
		UpdatePositions();
	});

	google.maps.event.addListener(map, "click", function(){
		infowindow.close();
	});
	
}

google.maps.event.addDomListener(window, 'load', initialize);