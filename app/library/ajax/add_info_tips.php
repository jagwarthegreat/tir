<?php
include '../config.php';

$cat_id = $_POST["e_cat_id"];
$userID = $_SESSION['system']['userid'];
$title = $_POST["title"];
$description = $_POST["description"];
$content = $_POST["content"];

$time = date("ymdhis");

$path = $_SERVER['DOCUMENT_ROOT']."/android/mediaFiles/postPictures/";
$target_file = $path . "tips-".$time.".jpg";

if(!empty($_FILES["file"]["name"])){
    $filepath = "https://tir.jagwarthegreat.tech/android/mediaFiles/postPictures/tips-".$time.".jpg";

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_FILES["file"])) {
        $check = getimagesize($_FILES["file"]["tmp_name"]);
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

    $editPic = @move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

}else{
  $filepath = "";
}

$result = mysql_query("INSERT INTO info_tips SET category_id = '$cat_id', creted_by = '$userID', subject = '$title', description = '$description'");
$lastId = mysql_insert_id();

if($result){
    mysql_query("INSERT INTO info_tips_detail SET tip_header_id = '$lastId', description = '$content', slug = '$filepath'");
	echo 1;
}else{
	echo 3;
}

?>