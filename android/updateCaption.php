<?php

	include 'config.php';

	$post_id = $_POST['post_id'];
	$text_caption = $_POST['text_caption'];

	$updateCaption = mysql_query("UPDATE post SET caption = '$text_caption' WHERE post_id = '$post_id'");

	if ($updateCaption) {
		echo "success";
	} else {
		echo "fail";
	}

