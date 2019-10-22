<?php

    include 'config.php';

    // if (isset($_FILES['media_picture']['name'])) {

       //  $users_id = $_POST['users_id'];
       //  $image_name = $_POST['image_name'];

       //  $folder_path = "mediaFiles/"."userPictures/".$image_name;

       //  try {
       //   // Throws exception incase file is not being moved
          //   if (!move_uploaded_file($_FILES['media_picture']['tmp_name'], $folder_path)) {
          //    // make error flag true 
          //    echo json_encode("Could not move the file!");
          //   } else {
          //    $file_upload_url = IP . '/' . 'android' . '/' . $folder_path;
                // mysql_query("UPDATE user SET slug = '$file_upload_url' WHERE user_id = '$users_id'");
             //    echo json_encode("success");
          //   }

       //  } catch (Exception $e) {
       //  // Exception occurred. Make error flag true
       //   echo json_encode("failed");
       //  }

    // } else {
    //  // File parameter is missing
    //  echo json_encode("Not received any file!");
    // }

    if (isset($_POST['imgPath'])) {
        
        $user_id = $_POST['user_id'];
        $img_path = mysql_fetch_array(mysql_query("SELECT slug from user where user_id = '$user_id'"));

        if ($img_path) {
            echo $img_path[0];
        }
    } 

    else if (isset($_POST['changeImg'])) {
        
        if (isset($_FILES['media_picture']['name'])) {

            $users_id = $_POST['users_id'];
            $image_name = $_POST['image_name'];
            $img_path = $_POST['img_path'];

            $path = "mediaFiles/"."userPictures/".$img_path;

            if ($img_path != 'null') {
                
                if (!unlink($path)) {

                    echo "error";
                } else {    

                    $folder_path = "mediaFiles/"."userPictures/".$image_name;

                    try {
                        // Throws exception incase file is not being moved
                        if (!move_uploaded_file($_FILES['media_picture']['tmp_name'], $folder_path)) {
                            // make error flag true 
                            echo json_encode("Could not move the file!");
                        } else {
                            $file_upload_url = IP . '/' . 'android' . '/' . $folder_path;
                            mysql_query("UPDATE user SET slug = '$file_upload_url' WHERE user_id = '$users_id'");
                            echo json_encode("success");
                        }

                    } catch (Exception $e) {
                    // Exception occurred. Make error flag true
                        echo json_encode("failed");
                    }
                }
            } else {
                
                $folder_path = "mediaFiles/"."userPictures/".$image_name;

                try {
                    // Throws exception incase file is not being moved
                    if (!move_uploaded_file($_FILES['media_picture']['tmp_name'], $folder_path)) {
                        // make error flag true 
                        echo json_encode("Could not move the file!");
                    } else {
                        $file_upload_url = IP . '/' . 'android' . '/' . $folder_path;
                        mysql_query("UPDATE user SET slug = '$file_upload_url' WHERE user_id = '$users_id'");
                        echo json_encode("success");
                    }

                } catch (Exception $e) {
                // Exception occurred. Make error flag true
                    echo json_encode("failed");
                }
            }

        } else {
            // File parameter is missing
            echo json_encode("Not received any file!");
        }
    }

    


