<?php

	include 'config.php';

	$post_id = $_POST['post_id'];
	$image_name = $_POST['image_name'];

	$path = "mediaFiles/"."postPictures/".$image_name;
		
	if (!unlink($path)) {

		$json['error'] = 'Error';
		echo json_encode($json);
	} else {

		$queryDelete = mysql_query("DELETE FROM post WHERE post_id = '$post_id'");

		if ($queryDelete) {
			echo "success";
		} else {
			echo "failed";
		}
	}

	