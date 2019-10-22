<?php 

include '../config.php';

$id = $_POST['id'];

$post = mysql_query("DELETE FROM post WHERE user_id = '$id'");
$delete = mysql_query("DELETE FROM user WHERE user_id = '$id'");

	if($delete || $post){
		echo 1;
	}else{
		echo 0;
	}



?>