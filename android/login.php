<?php

	include 'config.php';

	$user_name = $_POST['user_name']; 
	$user_pass = encryptIt($_POST['user_pass']);

	$userInfo = array();
	$user_data = mysql_fetch_array(mysql_query("SELECT * from user where username = '$user_name' and password = '$user_pass'"));
	$checkExist = mysql_num_rows(mysql_query("SELECT * from user where username = '$user_name' and password = '$user_pass'"));

	if ($checkExist > 0) {
		$userInfo['success'] = 'true';
		$userInfo['user_id'] = $user_data['user_id'];
		$userInfo['f_name'] = $user_data['f_name'];
		$userInfo['m_name'] = $user_data['m_name'];
		$userInfo['l_name'] = $user_data['l_name'];
		$userInfo['alias'] = $user_data['alias'];
		$userInfo['username'] = $user_data['username'];

	} else {
		$userInfo = 'fail';
	}
	echo json_encode($userInfo);

	