var brands = [];
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
	for (var brand_id in hotel_list) {
		var brand = brands.find(x => x.id == brand_id);
		for (var subbrand_id in hotel_list[brand_id]) {
			for (var category_id in hotel_list[brand_id][subbrand_id]) {
				category = brand.categories.find(x => x.id == category_id);
				var i = hotel_list[brand_id][subbrand_id][category_id].length;
				while (i--) {
					var points = null;
					if (!category) {
						points = category.points;
					}
					CreateMarker({
						'id': hotel_list[brand_id][subbrand_id][category_id][i][0],
						'lat': hotel_list[brand_id][subbrand_id][category_id][i][1],
						'long': hotel_list[brand_id][subbrand_id][category_id][i][2],
						'brand_id': category_id,
						'subbrand_id': subbrand_id,
						'category_id': category_id,
						'points': category_id,
					});
				}
			}
		}
	}

	hotel_list = null;
}

function CreateMarker(attrs) {
	var i = markers.length;
	markers[i] = (new google.maps.Marker({
		position: new google.maps.LatLng(attrs['lat'], attrs['long']),
		category: attrs['category_id'],
		pointsamount: attrs['points'],
		brand: attrs['brand_id'],
		subbrand: attrs['subbrand_id'],
		id: attrs['id'],
		map: map,
		//icon: markerImages[attrs['brand_id']],
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
		url: "infobox/"+id,
		dataType: 'json',
		timeout: 0,
		error: function(jqXHR, textStatus, errorThrown) {
			console.log(textStatus);
		}
	})
	.done(function( json ) {
		if (json["success"]) {
			infowindow.setContent(json["view"]);
			infowindow.open(map,marker);
		}
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

function MarkerShouldBeVisible(i) {
	brand = brands.find(x => x.id == markers[i].brand);
	if (!brand.show) {
		return false;
	}

	category = brand.categories.find(x => x.id == markers[i].category);
	if (!category.show) {
		return false;
	}

	subbrand = brand.subbrands.find(x => x.id == markers[i].subbrand);
	if (!subbrand.show) {
		return false;
	}

	if ( markers[i].pointsamount !== null && minpoints > markers[i].pointsamount && maxpoints < markers[i].pointsamount ) {
		return false;
	}

	return true;
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
	$(".check-brand").each(function() {
		var brand = new Brand;
		brand.id = $(this).data("brand");
		brand.show = $(this).prop('checked');
		$(".check-category[data-brand='"+brand.id+"']").each(function() {
			var category = new Category;
			category.id = $(this).data("category");
			category.points = $(this).data('points');
			category.show = $(this).prop('checked');
			brand.categories.push(category);
		});
		$(".check-subbrand[data-brand='"+brand.id+"']").each(function() {
			var subbrand = new Subbrand;
			subbrand.id = $(this).data("subbrand");
			subbrand.show = $(this).prop('checked');
			brand.subbrands.push(subbrand);
		});
		brands.push(brand);
	});

	if (typeof ga == 'function') { 
		ga('send', 'event', 'Awardomatic', 'Preferences Changed');
	}
}

$(document).ready(function(){
	if (typeof ga == 'function') { 
		ga('send', 'pageview');
	}
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
	collectPreferences();

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
	
	for (var brand in brands) {
		markerImages[brand.id] = {
			url: "img/marker-sprite-2x.png",
			size: new google.maps.Size(14, 27),
			scaledSize: new google.maps.Size(98, 27),
			origin: new google.maps.Point(brand.id*14,0),
			anchor: new google.maps.Point(7, 25)
		};
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