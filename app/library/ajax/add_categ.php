<?php 

include '../config.php';

$cname = $_POST['categName'];
$cdesc = $_POST['categDesc'];
$addedby = $_SESSION['system']['userid'];
$date = date("Y-m-d");

$insert = mysql_query("INSERT INTO incident_category SET name = '$cname', description = '$cdesc', added_by = '$addedby', date_added = '$date'");

	if($insert){
		echo 1;
	}else{
		echo 0;
	}

?>