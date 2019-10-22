<?php 

	include 'config.php';

	$lat = $_POST['lat'];
	$lon = $_POST['lon'];

	$result_['result'] = array();
	$location = mysql_query("SELECT * from safetyfirst_app");
	while ($details = mysql_fetch_array($location)) {

		$km = explode('.', distance($lat, $lon, $details['latitude'], $details['longitude'], 'K'));

		if($km[0] <= 1){

			$response["id"] = $details['id'];
			$response["name"] = $details['name'];
			$response["details"] = $details['details'];
			$response["latitude"] = $details['latitude'];
			$response["longitude"] = $details['longitude'];
			array_push($result_['result'], $response);
		}
	}

	echo json_encode($result_);


	function distance($lat1, $lon1, $lat2, $lon2, $unit) {
	  $theta = $lon1 - $lon2;
	  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
	  $dist = acos($dist);
	  $dist = rad2deg($dist);
	  $miles = $dist * 60 * 1.1515;
	  $unit = strtoupper($unit);

	  if ($unit == "K") {
	    return ($miles * 1.609344);
	  } else if ($unit == "N") {
	    return ($miles * 0.8684);
	  } else {
	    return $miles;
	  }
	}

