<?php
include '../config.php';
$id = $_POST['id'];

$header = mysql_fetch_array(mysql_query("SELECT * FROM info_tips WHERE tip_id = '$id'"));
$detail = mysql_fetch_array(mysql_query("SELECT * FROM info_tips_detail WHERE tip_header_id = '$id'"));

$list = array();

$list['tip_id'] = $header['tip_id'];
$list['subj'] = $header['subject'];
$list['desc1'] = $header['description'];
$list['desc2'] = $detail['description'];
$list['slug'] = $detail['slug'];

echo json_encode($list);

?>