<?php

	include 'config.php';
	

	function getCurrentDate(){
		ini_set('date.timezone','UTC');
		date_default_timezone_set('UTC');
		$today = date('H:i:s');
		$date = date('Y-m-d H:i', strtotime($today)+28800);
		return $date;
	}

    if (isset($_FILES['media_picture']['name'])) {

	    $users_id = $_POST['users_id'];
	    $image_name = $_POST['image_name'];
	    $location = $_POST['location'];
	    $caption = $_POST['caption'];
	    $incident = $_POST['incident'];
	    $others = $_POST['others'];
	    $date = getCurrentDate();


	    $folder_path = "mediaFiles/"."postPictures/".$image_name;
	    $file_upload_url = IP . '/' . 'android' . '/' . $folder_path;

	    try {
	    	// Throws exception incase file is not being moved
	    if (!move_uploaded_file($_FILES['media_picture']['tmp_name'], $folder_path)) {
	    	// make error flag true
	    	echo json_encode("Could not move the file!");
	    }

	    // File successfully uploaded
	    echo json_encode("success");

	    $role = mysql_fetch_array(mysql_query("SELECT role from user where user_id = '$users_id'"));
	    $can_post_direct = mysql_fetch_array(mysql_query("SELECT can_post_direct from roles where role_id = '$role[0]'"));

	    if ($can_post_direct[0] == '1') {
	    	mysql_query("INSERT into post (posted_by, slug, caption, location, category_id, date_created, status, others) 
	    	VALUES ('$users_id', '$file_upload_url', '$caption', '$location', '$incident', '$date', '1', '$others') ");

	    	$queryAll = mysql_query("SELECT * FROM user WHERE user_id != '$users_id'");
		    while($row = mysql_fetch_array($queryAll)) {

			   androidNotification("New report posted.", $row['token']);
			}
			
	    } else {
	    	mysql_query("INSERT into post (posted_by, slug, caption, location, category_id, date_created, others) 
	    	VALUES ('$users_id', '$file_upload_url', '$caption', '$location', '$incident', '$date', '$others') ");
	    }

	    
	    } catch (Exception $e) {
	    	// Exception occurred. Make error flag true
	    	echo json_encode("failed");
	    }

    } else {
    	// File parameter is missing
    	echo json_encode("Not received any file!");
    }

