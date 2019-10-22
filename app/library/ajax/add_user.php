<?php 

include '../config.php';
// include '../functions.php';

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$uname = $_POST['uname'];
$pass =  encryptIt($_POST['pass1']);
$bdate = $_POST['b-date'];
$mail = $_POST['e_mail'];

$check = mysql_num_rows(mysql_query("SELECT * FROM user WHERE username = '$uname' and dob = '$bdate' and f_name = '$fname' and l_name = '$lname'"));

if($check > 0){
	echo 2;
}else{

$insert = mysql_query("INSERT INTO user SET f_name = '$fname', l_name = '$lname', alias = '$uname', dob = '$bdate', email = '$mail', username = '$uname', password = '$pass', role = '3', status = 'A'");

	if($insert){
		echo 1;
	}else{
		echo 0;
	}

}
?>