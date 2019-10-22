<?php
include '../config.php';

$id = $_POST["e_user_id"];

$alias = $_POST["alias"];
$fname = $_POST["fname"];
$mname = $_POST["mname"];
$lname = $_POST["lname"];
$gender = $_POST["gender"];
$dob = $_POST["dob"];
$email = $_POST["email"];
$privacy = $_POST["privacy"];


$user = mysql_query("SELECT * FROM user WHERE user_id = '$id'");
$row = mysql_fetch_array($user);


$path = $_SERVER['DOCUMENT_ROOT']."/android/mediaFiles/userPictures/";
$target_file = $path . basename($_FILES["file"]["name"]);

if(!empty($_FILES["file"]["name"])){
  $filepath = "https://tir.jagwarthegreat.tech/android/mediaFiles/userPictures/".basename($_FILES["file"]["name"]);
}else{
  $filepath = $row['slug'];
}


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
// // Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) {
//     echo 2;
// // if everything is ok, try to upload file
// } else {

		$editPic = @move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
        
    	$result = mysql_query("UPDATE user SET alias = '$alias', f_name = '$fname', m_name = '$mname', l_name = '$lname', gender = '$gender', dob = '$dob', email = '$email', privacy = '$privacy', slug = '$filepath' WHERE user_id = '$id'");
		if($result){
			echo 1;
		}else{
			echo 3;
		}
// }
?>