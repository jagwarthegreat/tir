<?php 

include '../config.php';
// include '../functions.php';

$id = $_POST['id'];
$stat = $_POST['stat'];

$update = mysql_query("UPDATE user SET status = '$stat'WHERE user_id = '$id'");

	if($update){
		echo 1;
	}else{
		echo 0;
	}
?>