<?php 

include '../config.php';

$id = $_POST['id'];
$user = $_SESSION['system']['userid'];


	$delete1 = mysql_query("DELETE FROM post WHERE post_id = '$id'");
		if($delete1){
			echo 1;
		}else{
			echo 0;
		}

?>