<?php

function processLogin(){
    
    $userlogin = clean($_POST['userlogin']);
    $userpassword = clean(encryptIt($_POST['userpassword']));
    $re_userpassword = clean(encryptIt($_POST['re_userpassword']));
    
    $query = "SELECT *
              FROM user
              WHERE username = '$userlogin'
              AND password = '$userpassword'";

    $result = mysql_query($query) or die (mysql_error());

    if(mysql_num_rows($result) == 1){
        $row = mysql_fetch_assoc($result);

        if($row["status"] == 'C'){
                $_SESSION['system']['title']  = "Account Suspended!";
                $_SESSION['system']['error']  = "Please contact administrator.";
                $_SESSION['system']['type']  = "warning";
            header("Location:../system/login.php");
            exit;
        }else{

            $_SESSION['system']['userid'] = $row['user_id'];
            $usrid = $_SESSION['system']['userid'];

            $isOnline = mysql_query("UPDATE user SET online_stats = 1 WHERE user_id = '$usrid'");

            //checkRolePermision
            $getuserRole = mysql_fetch_array(mysql_query("SELECT role FROM user WHERE user_id = '$row[user_id]'"));
            $roleList = mysql_fetch_array(mysql_query("SELECT * FROM roles WHERE role_id = '$getuserRole[0]'"));

            if($roleList[show_dashboard] == 1){
                header("Location:../../index.php?view=dashboard");
            }else{
                header("Location:../../index.php");
            }
            
            exit;
        }
    }else{
        
        $_SESSION['system']['title']  = "Error!";
        $_SESSION['system']['error']  = "Username/Password Incorrect.";
        $_SESSION['system']['type']  = "danger";
        header("Location:../system/login.php");
        exit;
    }

}

function getSessionName($id){
	$result = mysql_query("SELECT * FROM user WHERE user_id = '$id'") or die (mysql_error());
	$row = mysql_fetch_assoc($result);
	
	$name = $row['alias'];
	
	return $name;
}

