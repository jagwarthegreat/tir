<?php 

include '../config.php';

$id = $_POST['id'];
$user = $_SESSION['system']['userid'];
$path = $_SERVER['DOCUMENT_ROOT']."/android/mediaFiles/postPictures/";

$check = mysql_num_rows(mysql_query("SELECT * FROM info_tips WHERE tip_id = '$id' AND creted_by = '$user'"));

if($check > 0){

	$tips_ = mysql_query("SELECT * FROM info_tips WHERE tip_id = '$id'");
	$tipsRow = mysql_fetch_array($tips_);
	// unlink picture first
	$default_img = "";
	if($tipsRow['slug'] != $default_img){
		$check_file = explode("-", $tipsRow['slug']);
		$curr_avatar = $check_file[1];
		$avtr = $path."tips-".$curr_avatar;
		$delPic = unlink($avtr);
	}

	$delete = mysql_query("DELETE FROM info_tips_detail WHERE tip_header_id = '$id'");

	if($delete){
		$delete1 = mysql_query("DELETE FROM info_tips WHERE tip_id = '$id' AND creted_by = '$user'");
		if($delete1){
			echo 1;
		}else{
			echo 0;
		}
	}else{
		echo 0;
	}

}else{
	echo 2;
}

?>