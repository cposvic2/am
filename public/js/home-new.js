var markers = [];
var map;

$(document).ready(function() {
	if (typeof ga == 'function') { 
		ga('send', 'pageview');
	}

	var LatLong = [38,-95, 4];
	if( typeof $.cookie('LatCookie')!='undefined' && typeof $.cookie('LongCookie')!='undefined' && typeof $.cookie('zoomCookie')!='undefined' ) {
		if($.cookie('LatCookie') <= 90 && $.cookie('LatCookie') >= -90 && $.cookie('LongCookie') <= 180 && $.cookie('LongCookie') >= -180 && $.cookie('zoomCookie') >= 3 && $.cookie('zoomCookie') <= 20) {
			LatLong = [ $.cookie('LatCookie'),$.cookie('LongCookie'), parseInt($.cookie('zoomCookie')) ];
		}
	}

	collectPreferences();

	infowindow = new google.maps.InfoWindow({
		maxWidth: 800,
		pixelOffset: new google.maps.Size(-1, 0)
	});

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
	];

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

	InitializeMarkers();

	google.maps.event.addListener(map, 'idle', function(){
		UpdatePositions();
	});

	google.maps.event.addListener(map, "click", function(){
		infowindow.close();
	});

	var autocomplete = new google.maps.places.Autocomplete(document.getElementById('search-input'));
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

	$('input.change-preferences').change(function(){
		preferencesChanged();
	});

	$('input.all-selector').change(function(){
		var checked = $(this).prop('checked');
		target = $(this).data('target');
		$('.'+target).each(function(){
			$(this).prop('checked', checked );
		});
		preferencesChanged();
	});

	$(".brand-expand").click(function () {
		var $expander = $(this);
		$expander.toggleClass( "expanded" );
		
		var target = $expander.data("target");
		var $content = $("."+target);

		if ($expander.hasClass("expanded")) {
			$content.addClass( "expanded" );
		} else {
			$content.removeClass( "expanded" );
		}
	});

	$(".menu-expand").click(function () {
		$('#points-slider, #hotel-brand').toggleClass( "expanded" );
	});

	$("#search input").click(function () {	
		if (typeof ga == 'function') { 
			ga('send', 'event', 'Awardomatic', 'Search Used');
		}
	});

	minpoints = 0;
	maxpoints = 100000;

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
				displayChecks();
				if (typeof ga == 'function') { 
					ga('send', 'event', 'Awardomatic', 'Slider Used');
				}
			}
		});
	});
});

function InitializeMarkers() {

	for (var brand_id in hotel_list) {
		var brand = brands.find(x => x.id == brand_id);
		for (var category_id in hotel_list[brand_id]) {
			var category = brand.categories.find(x => x.id == category_id);
			for (var subbrand_id in hotel_list[brand_id][category_id]) {
				var subbrand = brand.subbrands.find(x => x.id == subbrand_id);
				var i = hotel_list[brand_id][category_id][subbrand_id].length;
				while (i--) {
					var points = null;
					if (!!category) {
						points = category.points;
					}
					CreateMarker({
						'id': hotel_list[brand_id][category_id][subbrand_id][i][0],
						'lat': hotel_list[brand_id][category_id][subbrand_id][i][1],
						'long': hotel_list[brand_id][category_id][subbrand_id][i][2],
						'brand_id': brand_id,
						'subbrand_id': subbrand_id,
						'category_id': category_id,
						'points': points,
						'icon': "img/"+brand.marker_img,
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
		category_id: attrs['category_id'],
		points: attrs['points'],
		brand_id: attrs['brand_id'],
		subbrand_id: attrs['subbrand_id'],
		id: attrs['id'],
		map: map,
		icon: {
				url: attrs['icon'],
				size: new google.maps.Size(14, 27),
				scaledSize: new google.maps.Size(14, 27),
				origin: new google.maps.Point(0,0),
				anchor: new google.maps.Point(7, 25)
		},
		draggable: false,
	}));
	
	google.maps.event.addListener(markers[i], 'click', function() {
		MarkerClick(markers[i]);
	});
}

function MarkerClick(marker) {
	var id = marker.id;
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

function UpdatePositions() {
	//var start = new Date().getTime();
	var i = markers.length;
	while (i--) {
		if ( map.getBounds().contains( markers[i].getPosition() ) ) {
			if ( !markers[i].getMap() ) {
				AddMarker(markers[i]);
			}			
		} else {
			if ( markers[i].getMap() ) {
				RemoveMarker(markers[i]);
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

function AddMarker(marker) {
	marker.setMap(map);
	CheckMarkerVisibility(marker);
}

function RemoveMarker(marker) {
	marker.setMap(null);
}

function CheckMarkerVisibility(marker) {
	shouldBeVisible = false;
	brand_id = marker.brand_id;
	subbrand_id = marker.subbrand_id;
	category_id = marker.category_id;
	var brand = brands.find(x => x.id == brand_id);
	var category = brand.categories.find(x => x.id == category_id);
	var subbrand = brand.subbrands.find(x => x.id == subbrand_id);

	if (brand.show && category.show && subbrand.show && minpoints <= marker.points && maxpoints >= marker.points ) {
		shouldBeVisible = true;
	}

	if( shouldBeVisible && !marker.visible ) {
		marker.setVisible(true);
	} else if ( !shouldBeVisible && marker.visible ) {
		marker.setVisible(false);
	}
}

function collectPreferences() {
	$(".check-brand").each(function() {
		brand_id = $(this).data("brand");
		var brand = brands.find(x => x.id == brand_id);
		brand.show = $(this).prop('checked');
		$(".check-category[data-brand='"+brand.id+"']").each(function() {
			category_id = $(this).data("category");
			var category = brand.categories.find(x => x.id == category_id);
			category.show = $(this).prop('checked');
		});
		$(".check-subbrand[data-brand='"+brand.id+"']").each(function() {
			subbrand_id = $(this).data("subbrand");
			var subbrand = brand.subbrands.find(x => x.id == subbrand_id);
			subbrand.show = $(this).prop('checked');
		});
	});

	if (typeof ga == 'function') { 
		ga('send', 'event', 'Awardomatic', 'Preferences Changed');
	}
}

function preferencesChanged() {
	collectPreferences();
	displayChecks();
}

function displayChecks() {
	var i = markers.length;
	while (i--) {
		CheckMarkerVisibility(markers[i]);
	}
}