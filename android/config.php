<?php

	define("IP","https://tir.jagwarthegreat.tech");
	define('API_ACCESS_KEY','AAAA8J4Rgt0:APA91bFIKCemRJYSde4mWuErw8VdToDWhGPZxy1k3r8fBuNtTuihaIFPA-3VNf7AmtyV5m2Eu59_EZZuc27uKjgkLlWJbo-SezdiEOn1nLW2ESoToeBnWETiWt2mjT5FD_PguC1U6owOTZOHk0_-VISaWVjMhX1GLA');

	define("HOST", "mysql.hostinger.ph");
	define("USERNAME", "u983050363_wow");
	define("PASSWORD", "syswow2177!");
	define("DATABASE", "u983050363_tir");

	$connect = mysql_connect(HOST, USERNAME, PASSWORD) or die(mysql_error());
	mysql_select_db(DATABASE, $connect);

	function encryptIt( $q ) {
	    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
	    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
	    return( $qEncoded );
	}

	function decryptIt( $q ) {
	    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
	    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
	    return( $qDecoded );
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

	