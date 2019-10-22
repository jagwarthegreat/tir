<?php

	include 'config.php';

	$queryAll = mysql_query("SELECT * FROM incident_category");

	$results['incedentCategory'] = array();
	while($row = mysql_fetch_array($queryAll)) {
	   $response['category_id'] = $row['category_id'];
	   $response['name'] = $row['name'];
	
	   array_push($results['incedentCategory'], $response);
	}
	echo json_encode($results);
