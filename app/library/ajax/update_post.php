<?php 
	include '../config.php';

	$pid = $_POST['id'];
	$type = $_POST['type'];
	$a_id = $_POST['a_id'];
	$p_id = $_POST['p_id'];

	if($type == 'A'){
		$qry = mysql_query("UPDATE post SET status = 1, approve_by = '$a_id' WHERE post_id = '$pid'");
		if($qry){
			$get = mysql_fetch_array(mysql_query("SELECT token FROM user WHERE user_id = '$p_id'"));
			$notif = androidNotification("Your Post has been approved.", $get[0]);
			if(!empty($notif)){
				echo 1;
				$sql = mysql_query("SELECT token FROM user WHERE user_id != '$p_id'");
				while($row = mysql_fetch_array($sql)){
					androidNotification("New report has been posted. Check it out!", $row[0]);
				}
			}else{
				echo 1;
			}
			
		}else{
			echo 0;
		}
	}else{
		$qry = mysql_query("UPDATE post SET edited_status = 1 WHERE post_id = '$pid'");
		if($qry){
			echo 1;
		}else{
			echo 0;
		}
	}

?>