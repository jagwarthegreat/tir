<?php 

	include 'config.php';

	if (isset($_POST['updateInfo'])) {
		$user_id = $_POST['user_id'];
		$f_name = $_POST['f_name'];
		$m_name = $_POST['m_name'];
		$l_name = $_POST['l_name'];
		$address = $_POST['address'];
		$privacy = $_POST['privacy'];
		$alias = $_POST['alias'];

		$queryUpdate = mysql_query("UPDATE user SET f_name = '$f_name', 
														m_name = '$m_name', 
														l_name = '$l_name', 
														address = '$address',
														privacy = '$privacy',
														alias = '$alias'
												  WHERE user_id = '$user_id'");

		if ($queryUpdate) {
			echo "success";
		} else {
			echo "fail";
		}
	}

	else if (isset($_POST['getUserInfo'])) {
		$user_id = $_POST['user_id'];

		$response = array();
		$displayInfo = mysql_query("SELECT * from user where user_id = '$user_id'");

		while ($details = mysql_fetch_array($displayInfo)) {
			
			$response["f_name"] = $details['f_name'];
			$response["m_name"] = $details['m_name'];
			$response["l_name"] = $details['l_name'];
			$response["address"] = $details['address'];
			$response["username"] = $details['username'];
			$response["password"] = $details['password'];
			$response["privacy"] = $details['privacy'];
			$response["alias"] = $details['alias'];

			array_push($response, $details);
		}

		echo json_encode($response);
	}

	else if (isset($_POST['changePass'])) {
		$user_id = $_POST['user_id'];
		$user_pass = encryptIt($_POST['user_pass']);

		$queryChange = mysql_query("UPDATE user SET password = '$user_pass' WHERE user_id = '$user_id'");

		if ($queryChange) {
			echo "success";
		} else {
			echo "failed";
		}
	}