<?php

include '../config.php';

if(isset($_POST["id"]) && isset($_POST["id"]) != ""){
	$customer_id = $_POST['id'];

	$query = "DELETE FROM customers WHERE customer_id = '$customer_id'";
	$result = mysql_query($query) or die (mysql_error());

	if($result){
		echo "Data is successfully deleted";
	}else{
		echo "ops,something went wrong";
	}

}
