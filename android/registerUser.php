<?php

	include 'config.php';

	$user_name = $_POST['user_name'];
	$user_pass = encryptIt($_POST['user_pass']);
	$dob = $_POST['dob']; 
	$f_name = $_POST['f_name'];
	$m_name = $_POST['m_name'];
	$l_name = $_POST['l_name'];
	$alias = $_POST['alias'];
	$address = $_POST['address'];
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];

	$checkDuplicate = mysql_num_rows(mysql_query("SELECT * from user where username = '$user_name'"));

	if ($checkDuplicate != 1) {
		$queryAdd = mysql_query("INSERT into user(username, 
												  password,
												  f_name,
											 	  m_name,
												  l_name,
												  alias,
												  address,
												  dob, 
												  gender,
												  role,
												  status) 
			 									  VALUES 
			 								   ('$user_name',
			 									'$user_pass',
			 									'$f_name',
			 									'$m_name',
			 									'$l_name',
			 									'$alias',
			 									'$address',
			 									'$dob',
			 									'$gender',
			 									'3',
			 									'A')") or die(mysql_error());
		if ($queryAdd) {
			echo "success";
		} else {
			echo "fail";
		}
	} else {
		echo "duplicate";
	}	

	

	







