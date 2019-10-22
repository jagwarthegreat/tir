<?php 

	include 'config.php';

	if (isset($_POST['getUserPost'])) {
		$user_id = $_POST['posted_by'];

		$userReport['report'] = array();
		$userPost = mysql_query("SELECT * from post where posted_by = '$user_id'");

		while ($details = mysql_fetch_array($userPost)) {
			
			$alias = mysql_fetch_array(mysql_query("SELECT alias from user where user_id = '$details[posted_by]'"));

			$response["post_id"] = $details['post_id'];
			$response["posted_by"] = $details['posted_by'];
			$response["alias"] = $alias[0];
			$response["caption"] = $details['caption'];
			$response["location"] = $details['location'];
			$response["slug"] = $details['slug'];
			$response["category_id"] = $details['category_id'];
			$response["status"] = $details['status'];
			$response["date_created"] = date("M j, Y • g:i A", strtotime($details['date_created']));

			array_push($userReport['report'], $response);
		}

		echo json_encode($userReport);
	} 
	else if (isset($_POST['viewUserReport'])) {
		$user_id = $_POST['posted_by'];

		$userReport['report'] = array();
		$userPost = mysql_query("SELECT * from post where posted_by = '$user_id' and status = '1'");

		while ($details = mysql_fetch_array($userPost)) {
			
			$alias = mysql_fetch_array(mysql_query("SELECT alias from user where user_id = '$details[posted_by]'"));

			$response["post_id"] = $details['post_id'];
			$response["posted_by"] = $details['posted_by'];
			$response["alias"] = $alias[0];
			$response["caption"] = $details['caption'];
			$response["location"] = $details['location'];
			$response["slug"] = $details['slug'];
			$response["category_id"] = $details['category_id'];
			$response["status"] = $details['status'];
			$response["date_created"] = date("M j, Y • g:i A", strtotime($details['date_created']));

			array_push($userReport['report'], $response);
		}

		echo json_encode($userReport);
	}