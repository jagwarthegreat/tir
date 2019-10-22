<?php
include '../config.php';

$name = $_REQUEST["name"];
$getID = $_REQUEST["id"];

$manage_master_data = $_REQUEST["manage_master_data"];
$view_dashboard = $_REQUEST["view_dashboard"];
$approve_post = $_REQUEST["approve_post"];
$manage_role = $_REQUEST["manage_role"];
$manage_users = $_REQUEST["manage_users"];
$manage_cat = $_REQUEST["manage_cat"];
$view_map = $_REQUEST["view_map"];
$post_direct = $_REQUEST["post_direct"];


$result = mysql_query("UPDATE roles SET level = '$name', 
	show_master_data = '$manage_master_data ',
	show_dashboard = '$view_dashboard',
	can_approve_post = '$approve_post',
	can_add_role = '$manage_role',
	can_view_users = '$manage_users',
	can_add_category = '$manage_cat',
	can_view_map = '$view_map',
	can_post_direct = '$post_direct'
	WHERE role_id = '$getID'");