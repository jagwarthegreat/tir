<?php

include '../config.php';

if(isset($_POST))
{
    $id = $_POST['id'];

    $category = $_POST['category'];
    $sub_category = $_POST['sub_category'];
    $description = $_POST['description'];

    $query = "UPDATE category SET category = '$category',sub_category = '$sub_category', description = '$description' WHERE category_id = '$id'";
    $result = mysql_query($query) or die (mysql_error());

	if($result){
		echo "Record is successfully updated";
	}else{
		echo "ops something went wrong";
	}

}
