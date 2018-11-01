function reportBuild( reportid, reportlat, reportlong ) {
	if (typeof ReportMarker != 'undefined')
		ReportMarker.setMap(null);
	var bounds = new google.maps.LatLngBounds();
	$('input#problemReportLat').val(0);
	$('input#problemReportLong').val(0);
	var reportmarkerpoint = new google.maps.LatLng(reportlat,reportlong);
	ReportMarker = new google.maps.Marker({
		position: reportmarkerpoint,
		map: ReportMap,
		draggable: true,
	});
	google.maps.event.addListener(ReportMarker, "dragend", function(event) {
		$('input#problemReportLat').val( event.latLng.lat() );
		$('input#problemReportLong').val( event.latLng.lng() );
	}); 
	ReportMap.setCenter(reportmarkerpoint);
	ReportMap.setZoom(16);
	$('#problemreportoverlay').fadeTo( 300, .7 )
	$('#problemReport').animate({top: '120px'}, 300);
}

$("#problemreportoverlay").click(function () {
	$('#problemreportoverlay').fadeOut( 300 );
	$('#problemReport').animate({top: '-590px'}, 300);

});

$(document).ready(function(){
	$(".comment-checkbox").click(function () {
		$(this).parent().next(".comment-box-container").slideToggle(250);	
	});

	$("#cancel").click(function () {
		window.close();
	});

	$(".property-container").click(function () {
		$(this).hide();
		$(this).next(".property-expand").show();	
	});

	$("#submit").click(function () {
		if ( 0 != $('input#problemReportLong').val() || $('.property-expand:visible').length || $('input.comment-checkbox:checked').length ) {
			var ajaxdata = hotel;
			$('input.comment-checkbox:checked').each(function(){
				ajaxdata[$(this).attr("id")] = 1;
				if ( $(this).parent().next(".comment-box-container").find("textarea").val().trim().length > 0 )
					ajaxdata[ $(this).parent().next(".comment-box-container").find('textarea').attr('id') ] = $(this).parent().next(".comment-box-container").find("textarea").val();
			});
			$('.property-expand:visible').each(function(){
				$(this).find('input').each(function(){
					ajaxdata[ $(this).attr('id') ] = $(this).val();
				});
				$(this).find('select').each(function(){
					ajaxdata[ $(this).attr('id') ] = $(this).find('option:selected').val();
				});
			});
			if ( 0 != $('input#problemReportLong').val() ) {
				ajaxdata["nlat"] = $('input#problemReportLat').val();
				ajaxdata["nlong"] = $('input#problemReportLong').val();
			}
			console.log(ajaxdata);
			$.ajax({
				url: "submit",
				dataType: 'json',
				data: ajaxdata,
				timeout: 0,
				error: function(jqXHR, textStatus, errorThrown) {
					$("div#submit-status").text('Sending error, please try again later.').removeClass().addClass("submit-status submit-fail").slideDown(150);
				}
			})
			.done(function( json ) {
				console.log( json );
				if ( json["status"] == "RECEIVED" ) {
					$("div#submit-status").text('Request sent, thanks.').removeClass().addClass("submit-status submit-success").slideDown(150);
					setTimeout(function(){
						self.close();
					},3000);
				} else if ( json["status"] == "ERROR_NO_CHANGES" ) {
					$("div#submit-status").text('No changes were submitted.').removeClass().addClass("submit-status submit-fail").slideDown(150);
				} else {
					$("div#submit-status").text('Sending error, please try again later.').removeClass().addClass("submit-status submit-fail").slideDown(150);
				}
			});			
		} else {
			$("div#submit-status").text('No changes were made. Please suggest changes.').removeClass().addClass("submit-status submit-issue").slideDown(150);
		}

	});

});

function initialize() {
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
	$('input#problemReportLat').val(0);
	$('input#problemReportLong').val(0);

	var reportmarkerpoint = new google.maps.LatLng(hotel["lat"],hotel["lng"]);
	ReportMarker = new google.maps.Marker({
		position: reportmarkerpoint,
		map: ReportMap,
		draggable: true,
	});
	google.maps.event.addListener(ReportMarker, "dragend", function(event) {
		$('input#problemReportLat').val( event.latLng.lat() );
		$('input#problemReportLong').val( event.latLng.lng() );
	}); 
	ReportMap.setCenter(reportmarkerpoint);
	ReportMap.setZoom(16);

}

google.maps.event.addDomListener(window, 'load', initialize);