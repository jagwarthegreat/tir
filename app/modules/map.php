<style>
	#map_canvas{
	    width:100%;
	    height: 500px;
	}
</style>
	
   
<div class="row" style="margin-top: 15px;">
	<div class="col-md-12" style="margin-bottom: 5px;">
		<span><strong>LEGEND</strong>: Fast 

			<span class="badge badge-secondary" style="border-radius: 0px;background: #84ca50;width: 18px;">&nbsp;</span>
			<span class="badge badge-secondary" style="border-radius: 0px;background: #f07d02;width: 18px;">&nbsp;</span>
			<span class="badge badge-secondary" style="border-radius: 0px;background: #e60000;width: 18px;">&nbsp;</span>
			<span class="badge badge-secondary" style="border-radius: 0px;background: #9e1313;width: 18px;">&nbsp;</span>

		 Slow</span>
	</div>
	<div class="col-md-12">
		<div id="map_canvas"></div>
	</div>
</div>

<script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC232qKEVqI5x0scuj9UGEVUNdB98PiMX0&callback=init_map"></script>  
<script type="text/javascript">

	$(document).ready(function() {
		setInterval(function(){
			init_map();
		}, 300000);
	});

    function init_map() {

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            var options = {
            zoom: 15,
            center: new google.maps.LatLng(position.coords.latitude, position.coords.longitude),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
			styles:
				[{
					featureType: "poi",
					elementType: "labels",
				stylers:
					[{
						visibility: "off"
					}]

				}]
			};

            map = new google.maps.Map(document.getElementById("map_canvas"), options);
			var trafficLayer = new google.maps.TrafficLayer();
			trafficLayer.setMap(map);
			map.panBy(0, 70);

            var marker = new google.maps.Marker({
			  position: pos,
			  map: map
			});

            // infoWindow.setPosition(pos);
            // infoWindow.setContent('Location found.');
            // infoWindow.open(map);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
		
    }

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
	}

    google.maps.event.addDomListener(window, 'load', init_map);
</script>