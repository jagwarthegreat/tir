<?php
include '../config.php';

$userID = $_SESSION['system']['userid'];
$title = $_POST["update_title"];
$description = $_POST["update_description"];
$content = $_POST["update_content"];
$tip_id = $_POST["update_id"];

$time = date("ymdhis");

$path = $_SERVER['DOCUMENT_ROOT']."/android/mediaFiles/postPictures/";
$target_file = $path . "tips-".$time.".jpg";

$tips_ = mysql_query("SELECT * FROM info_tips_detail WHERE tip_header_id = '$tip_id'");
$tipsRow = mysql_fetch_array($tips_);

if(!empty($_FILES["update_file"]["name"])){
  $filepath = "https://tir.jagwarthegreat.tech/android/mediaFiles/postPictures/tips-".$time.".jpg";
}else{
  $filepath = $tipsRow['slug'];
}

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_FILES["update_file"])) {
    $check = getimagesize($_FILES["update_file"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    $uploadOk = 0;
}

// unlink picture first
$default_img = "";
if($tipsRow['slug'] != $default_img){
	$check_file = explode("-", $tipsRow['slug']);
	$curr_avatar = $check_file[1];
	$avtr = $path."tips-".$curr_avatar;
	$delPic = unlink($avtr);
}

$editPic = @move_uploaded_file($_FILES["update_file"]["tmp_name"], $target_file);

$result_header = mysql_query("UPDATE info_tips SET subject = '$title', description = '$description' WHERE tip_id = '$tip_id'");
if($result_header){
	$result = mysql_query("UPDATE info_tips_detail SET description = '$content', slug = '$filepath' WHERE tip_header_id = '$tip_id'");
	echo 1;
}else{
    echo 2;
}
?>