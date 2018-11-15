$(document).ready(function(){
	$(".comment-checkbox").click(function () {
		var target = $(this).data("target");
		$(target).slideToggle(250);
	});

	$("#cancel").click(function () {
		window.close();
	});

	$(".property-container").click(function () {
		var target = $(this).data("target");
		$(this).addClass("hidden");
		$(target).removeClass("hidden");
	});

	var ReportMapOptions = {
		disableDefaultUI: true,
		mapTypeControl: true,
		zoomControl: true,
		zoomControlOptions: {
    		style:google.maps.ZoomControlStyle.SMALL,
		},
		mapTypeId:google.maps.MapTypeId.ROADMAP
	};

	ReportMap = new google.maps.Map(document.getElementById('problemReport-marker-map'), ReportMapOptions);
	var bounds = new google.maps.LatLngBounds();

	var reportmarkerpoint = new google.maps.LatLng(hotel["lat"],hotel["lng"]);
	ReportMarker = new google.maps.Marker({
		position: reportmarkerpoint,
		map: ReportMap,
		draggable: true,
	});
	google.maps.event.addListener(ReportMarker, "dragend", function(event) {
		$('input#latitude').val( event.latLng.lat() );
		$('input#longitude').val( event.latLng.lng() );
	}); 
	ReportMap.setCenter(reportmarkerpoint);
	ReportMap.setZoom(16);
});