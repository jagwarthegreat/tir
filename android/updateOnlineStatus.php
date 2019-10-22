<?php

	include 'config.php';

	$user_id = $_POST['user_id'];
	$online_stats = $_POST['online_stats'];

	$update = mysql_query("UPDATE user SET online_stats = '$online_stats' WHERE user_id = '$user_id'");

	if ($update) {
		echo "success";
	} else {
		echo "failed";
	}