
     
    <style>
	
    #map_canvas{
        width:100%;
        height: 30em;
		}
		

    </style>
<body>
	
    <div id="map_canvas">Geocoding address...</div><br>
	
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>    
    <script type="text/javascript">
        function init_map() {
            var options = {
                zoom: 15,
                center: new google.maps.LatLng(10.6159995, 122.9693025),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
				styles:
						[
							{
								featureType: "poi",
								elementType: "labels",
						stylers:
							[
								{
									visibility: "off"
								}
							]

							}

						]
							
									};
            map = new google.maps.Map(document.getElementById("map_canvas"), options);
			var trafficLayer = new google.maps.TrafficLayer();
			trafficLayer.setMap(map);
					map.panBy(0, 70);
			
        }
        google.maps.event.addDomListener(window, 'load', init_map);
    </script>