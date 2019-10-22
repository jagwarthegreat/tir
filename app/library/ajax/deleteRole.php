<?php
include '../config.php';

$getID = $_REQUEST["id"];
$result = mysql_query("DELETE FROM roles WHERE role_id = '$getID'");