<?php
include '../config.php';
$id = $_POST['id'];
$type = $_POST['type'];
if(isset($_POST['caption'])){
	$caption = mysql_escape_string($_POST['caption']);
}

if($type == 'E'){

	$post = mysql_fetch_array(mysql_query("SELECT * FROM post WHERE post_id = '$id'"));

	$list = array();

	$list['caption'] = $post['caption'];

	echo json_encode($list);

}else{
	$post = mysql_query("UPDATE post SET caption = '$caption' WHERE post_id = '$id'");
	if($post){
		echo 1;
	}else{
		echo 0;
	}
}


?>