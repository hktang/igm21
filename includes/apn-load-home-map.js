$(function() {
	
	var myLat = 34.7667;
	var myLong = 113.6500;
	var myZoomLevel = 5;
	var myCanvasId = "home-map-canvas";
	
	
	/* basically no need to change the code below ne ... */
	
	var markerLoc=new google.maps.LatLng(myLat,myLong);
	var myCenter=new google.maps.LatLng( myLat + 0.340692, myLong - 3.067081);

	var marker=new google.maps.Marker({
		position	: markerLoc,
		animation	: google.maps.Animation.DROP,
		title		: 'Siem Reap, Cambodia',
		url			: 'http://www.apn-gcr.org/igm/'
	});

	function initialize()
	{
	var mapProp = {
		center		: myCenter,
		zoom		: myZoomLevel,
		draggable	: true,
		scrollwheel	: true,
		mapTypeId	: google.maps.MapTypeId.TERRAIN
	};

	var map=new google.maps.Map(document.getElementById(myCanvasId),mapProp);

	marker.setMap(map);
	}
    
	google.maps.event.addDomListener(window, 'load', initialize);
	google.maps.event.addListener(marker, 'click', function() {window.location.href = marker.url;});

});
