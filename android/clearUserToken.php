<?php

	include 'config.php';

	$user_id = $_POST['user_id'];

	$queryClear = mysql_query("UPDATE user SET token = '' WHERE user_id = '$user_id'");

	if ($queryClear) {
		echo "success";
	} else {
		echo "failed";
	}
