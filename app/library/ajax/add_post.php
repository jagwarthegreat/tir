<?php 
include '../config.php';
date_default_timezone_set("Asia/Manila");
$id = $_POST["post_user_id"];

$categ = $_POST['post_categ'];
$remarks = $_POST['post_remarks'];
$date = date("Y-m-d H:i");
$loc = $_POST['loc'];
$others = $_POST['others'];

$direct_post = mysql_fetch_array(mysql_query("SELECT can_post_direct FROM `user` as u, roles as r WHERE u.user_id = '$id' AND u.role = r.role_id"));

$path = $_SERVER['DOCUMENT_ROOT']."/android/mediaFiles/postPictures/";
$target_file = $path . basename($_FILES["file"]["name"]);
$filepath = "https://tir.jagwarthegreat.tech/android/mediaFiles/postPictures/".basename($_FILES["file"]["name"]);

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

		move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
        
    	$result = mysql_query("INSERT INTO `post` VALUES ('','','$id','$remarks','$categ','$others','$loc','$filepath','','$direct_post[0]','','$date')");
		if($result){
			echo 1;
			if($direct_post[0] == 1){
				$sql = mysql_query("SELECT token FROM user'");
				while($row = mysql_fetch_array($sql)){
					androidNotification("A new Post was added, Check it Out!", $row[0]);
				}
			}
		}else{
			echo 3;
		}

?>