<?php 
include __DIR__ . '/../../jag.ini.php';
ini_set('date.timezone','UTC');
//error_reporting(E_ALL);
date_default_timezone_set('UTC');
$today = date('H:i:s');
$date = date('Y-m-d H:i:s A', strtotime($today)+28800);

session_start();

$host = HOST;
$username = USERNAME;
$password = PASSWORD;
$database = DATABASE;

@mysql_connect($host, $username, $password) or die("Cannot connect to MySQL Server");
@mysql_select_db($database) or die ("Cannot connect to Database");


foreach(unserialize(VALUE) as $val){
	if(!empty($val)){
		include  __DIR__ .'/'.$val;
	}
}
