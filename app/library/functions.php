<?php

define('API_ACCESS_KEY','AAAA8J4Rgt0:APA91bFIKCemRJYSde4mWuErw8VdToDWhGPZxy1k3r8fBuNtTuihaIFPA-3VNf7AmtyV5m2Eu59_EZZuc27uKjgkLlWJbo-SezdiEOn1nLW2ESoToeBnWETiWt2mjT5FD_PguC1U6owOTZOHk0_-VISaWVjMhX1GLA');

function getAccessLevel($userID){
    $getUserAccessLevel = mysql_fetch_array(mysql_query("SELECT r.level FROM user AS u, roles AS r WHERE u.user_id = '$userID' AND u.role = r.role_id"));
    return $getUserAccessLevel[0];
}

function getAccess($userID){
    $getAccess = mysql_fetch_array(mysql_query("SELECT r.role_id FROM user AS u, roles AS r WHERE u.user_id = '$userID' AND u.role = r.role_id"));
    return $getAccess[0];
}

//------------------------------------------------------------------------------------//
// your other functions here

function getRole($id)
{
	$getRole = mysql_fetch_array(mysql_query("SELECT level FROM roles WHERE role_id = '$id'"));
	return $getRole[0];
}

function getAuthor($id)
{
	$getAuthor = mysql_fetch_array(mysql_query("SELECT * FROM user WHERE user_id = '$id'"));
	return $getAuthor['f_name']." ".$getAuthor['l_name'];
}

function getPostDate($date)
{
	$postDate = date("M j, Y • g:i A", strtotime($date));
	return $postDate;
}

function androidNotification($message, $token)
{
    if ($token != null) {

        $fcmUrl = 'https://fcm.googleapis.com/fcm/send';

        $notification = [
            'title' =>'BTIR',
            'body' => $message,
            'icon' =>'myIcon', 
            'sound' => 'mySound'
        ];
        $extraNotificationData = ["message" => $notification,"moredata" =>'dd'];

        $fcmNotification = [
            //'registration_ids' => $tokenList, //multple token array
            'to'        => $token, //single token
            'notification' => $notification,
            'data' => $extraNotificationData
        ];

        $headers = [
            'Authorization: key=' . API_ACCESS_KEY,
            'Content-Type: application/json'
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
}

function getAvatar($id)
{
    $getAvatar = mysql_fetch_array(mysql_query("SELECT slug FROM user WHERE user_id = '$id'"));
    if(!empty($getAvatar[0])){
        $avatar = $getAvatar[0];
    }else{
        $avatar = "https://ssl.gstatic.com/accounts/ui/avatar_2x.png";
    }
    return $avatar;
}

function getPendingPost()
{
    $getPost = mysql_num_rows(mysql_query("SELECT * FROM post WHERE status != 1"));
    return $getPost;
}

function getApprovedPost()
{
    $getApprovedPost = mysql_num_rows(mysql_query("SELECT * FROM post WHERE status = 1"));
    return $getApprovedPost;
}

function getTotalUsers()
{
    $getUser = mysql_num_rows(mysql_query("SELECT * FROM user"));
    return $getUser;
}

function getTotalPostsByUser($id)
{
    $getPosts = mysql_num_rows(mysql_query("SELECT * FROM post WHERE posted_by = '$id'"));
    return $getPosts;
}

?>