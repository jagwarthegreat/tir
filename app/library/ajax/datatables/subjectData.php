<?php
//include '../../config.php';


$response['data'] = array();
$list = array();

$x = 1;

while ($x <= 20) {
	$list['col1'] = "test1";
	$list['col2'] = "test2";
	$list['col3'] = "test3";
	$list['col4'] = "test4";
	$list['col5'] = "test5";
	$list['col6'] = "test6";
	$list['col7'] = "test7";
	$list['col8'] = "test8";
	$list['col9'] = "test9";

	array_push($response['data'],$list);
	$x++;
}

echo json_encode($response);