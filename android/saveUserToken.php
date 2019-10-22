<?php

	include 'config.php';

	$token = $_POST['token'];
	$user_id = $_POST['user_id'];

	$queryToken = mysql_query("UPDATE user SET token = '$token' WHERE user_id = '$user_id'");

	if ($queryToken) {
		$queryToken = mysql_fetch_array(mysql_query("SELECT slug FROM user where user_id = '$user_id'"));
		echo $queryToken[0];
	} else {
		echo "fail";
	}

