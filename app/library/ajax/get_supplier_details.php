<?php

include '../config.php';

if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // get User ID
    $supplier_id = $_POST['id'];

    // Get User Details
    $query = "SELECT * FROM suppliers WHERE supplier_id = '$supplier_id'";
  $result = mysql_query($query);
    $response = array();
    if(mysql_num_rows($result) > 0) {
      while ($row = mysql_fetch_assoc($result)) {
          $response = $row;
      }
    }
    else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
    // display JSON data
    echo json_encode($response);
}
