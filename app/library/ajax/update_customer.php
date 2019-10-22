<?php

include '../config.php';

if(isset($_POST))
{
    $id = $_POST['id'];

    $customer_name = $_POST['customer_name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $date = get_date();

    $query = "UPDATE customers SET customer = '$customer_name',address = '$address', contact_no = '$contact',date_updated = '$date' WHERE customer_id = '$id'";
    $result = mysql_query($query) or die (mysql_error());

	if($result){
		echo "Record is successfully updated";
	}else{
		echo "ops something went wrong";
	}

}
