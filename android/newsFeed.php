<?php 

	include 'config.php';

	if (isset($_POST['newsFeed'])) {
		$category_id = $_POST['category_id'];
		$userReport['report'] = array();

		if ($category_id != '0') {
				$userPost = mysql_query("SELECT * FROM post where category_id = '$category_id' and status = '1' order by post_id desc");
				while ($details = mysql_fetch_array($userPost)) {
				
				$incident = mysql_fetch_array(mysql_query("SELECT name from incident_category where category_id = '$details[category_id]'"));
				$user_info = mysql_fetch_array(mysql_query("SELECT * from user where user_id = '$details[posted_by]'"));
				$roles = mysql_fetch_array(mysql_query("SELECT level from roles where role_id = '$user_info[role]'"));
				$userPicture = mysql_fetch_array(mysql_query("SELECT slug from user where user_id = '$details[posted_by]'"));

				$response["others"] = $details['others'];
				$response["edited_status"] = $details['edited_status'];
				$response["post_id"] = $details['post_id'];
				$response["posted_by"] = $details['posted_by'];
				$response["alias"] = $user_info['alias'];
				$response["caption"] = $details['caption'];
				$response["location"] = $details['location'];
				$response["slug"] = $details['slug'];
				$response["category_id"] = $incident[0];
				$response["status"] = $details['status'];
				$response["userPicture"] = $userPicture[0];
				$response["userName"] = $user_info['f_name'];
				$response["userMName"] = $user_info['m_name'];
				$response["userLastName"] = $user_info['l_name'];
				$response["privacy"] = $user_info['privacy'];
				$response["role"] = $roles[0];
				$response["date_created"] = date("M j, Y • g:i A", strtotime($details['date_created']));

				array_push($userReport['report'], $response);
			}
			echo json_encode($userReport);
		} else {
				$userPost = mysql_query("SELECT * from post where status = '1' order by post_id desc");
				while ($details = mysql_fetch_array($userPost)) {
				
				$incident = mysql_fetch_array(mysql_query("SELECT name from incident_category where category_id = '$details[category_id]'"));
				$user_info = mysql_fetch_array(mysql_query("SELECT * from user where user_id = '$details[posted_by]'"));
				$roles = mysql_fetch_array(mysql_query("SELECT level from roles where role_id = '$user_info[role]'"));
				$userPicture = mysql_fetch_array(mysql_query("SELECT slug from user where user_id = '$details[posted_by]'"));

				$response["others"] = $details['others'];
				$response["edited_status"] = $details['edited_status'];
				$response["post_id"] = $details['post_id'];
				$response["posted_by"] = $details['posted_by'];
				$response["alias"] = $user_info['alias'];
				$response["caption"] = $details['caption'];
				$response["location"] = $details['location'];
				$response["slug"] = $details['slug'];
				$response["category_id"] = $incident[0];
				$response["status"] = $details['status'];
				$response["userPicture"] = $userPicture[0];
				$response["userName"] = $user_info['f_name'];
				$response["userMName"] = $user_info['m_name'];
				$response["userLastName"] = $user_info['l_name'];
				$response["privacy"] = $user_info['privacy'];
				$response["role"] = $roles[0];
				$response["date_created"] = date("M j, Y • g:i A", strtotime($details['date_created']));

				array_push($userReport['report'], $response);
			}
			echo json_encode($userReport);
		}

		
	}

	