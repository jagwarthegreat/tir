<?php

	include 'config.php';

	if (isset($_POST['help_category'])) {
		
		$queryHelp = mysql_query("SELECT * FROM incident_category");

		$results['report'] = array();
		while($row = mysql_fetch_array($queryHelp)) {

		   $results['category_id'] = $row['category_id'];
		   $results['name'] = $row['name'];
		   $results['description'] = $row['description'];
		   $results['added_by'] = $row['added_by'];
		   $results['date_added'] = $row['date_added'];

		   array_push($results['report'], $row);
		}

		echo json_encode($results);
	} 

	else if (isset($_POST['help'])) {
		
		$category_id = $_POST['category_id'];
		$queryHelp = mysql_query("SELECT * FROM info_tips where category_id = '$category_id'");

		$results['report'] = array();
		while($row = mysql_fetch_array($queryHelp)) {

		   $results['tip_id'] = $row['tip_id'];
		   $results['ref_num'] = $row['ref_num'];
		   $results['category_id'] = $row['category_id'];
		   $results['subject'] = $row['subject'];
		   $results['creted_by'] = $row['creted_by'];
		   $results['description'] = $row['description'];

		   array_push($results['report'], $row);
		}

		echo json_encode($results);
	}

	else if (isset($_POST['help_details'])) {
		$getCategory_id = $_POST['getCategory_id'];

		$queryAll = mysql_query("SELECT * FROM info_tips_detail WHERE tip_header_id = '$getCategory_id'");

		$results = array();
		while($row = mysql_fetch_array($queryAll)) {
			
		   $results['description'] = $row['description'];
		   $results['slug'] = $row['slug'];

		   array_push($results, $row);
		}
		echo json_encode($results);
	}

	

	

