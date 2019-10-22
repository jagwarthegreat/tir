<?php 

include '../config.php';
// include '../functions.php';

$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$uname = $_POST['uname'];
$pass =  encryptIt($_POST['pass1']);
$role = $_POST['roles'];

$check = mysql_num_rows(mysql_query("SELECT * FROM user WHERE username = '$uname' and f_name = '$fname' and l_name = '$lname'"));

if($check > 0){
	echo 2;
}else{

$insert = mysql_query("INSERT INTO user SET f_name = '$fname', m_name = '$mname', l_name = '$lname', alias = '$uname', username = '$uname', password = '$pass', role = '$role', status = 'A'");

	if($insert){
		echo 1;
	}else{
		echo 0;
	}

}
?>