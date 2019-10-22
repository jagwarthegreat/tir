<?php

include '../config.php';

if(isset($_POST["id"]) && isset($_POST["id"]) != ""){
	$category_id = $_POST['id'];

	$query = "DELETE FROM incident_category WHERE category_id = '$category_id'";
	$result = mysql_query($query) or die (mysql_error());

	if($result){
		echo 1;
	}else{
		echo 0;
	}

}
