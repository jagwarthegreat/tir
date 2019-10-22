<?php

	include 'config.php';

	$user_id = $_POST['user_id'];

	$queryAll = mysql_query("SELECT * FROM user WHERE user_id = '$user_id'");

	$ApproveReport = mysql_num_rows(mysql_query("SELECT * from post where posted_by = '$user_id' and status = '1'"));
	$pendingReport = mysql_num_rows(mysql_query("SELECT * from post where posted_by = '$user_id' and status = '0'"));
	$totalReport = mysql_num_rows(mysql_query("SELECT * from post where posted_by = '$user_id'"));

	$results = array();
	while($row = mysql_fetch_array($queryAll)) {

	   $role = mysql_fetch_array(mysql_query("SELECT level from roles where role_id = '$row[role]'"));

	   $results['f_name'] = $row['f_name'];
	   $results['m_name'] = $row['m_name'];
	   $results['l_name'] = $row['l_name'];
	   $results['slug'] = $row['slug'];
	   $results['alias'] = $row['alias'];
	   $results['gender'] = $row['gender'];
	   $results['address'] = $row['address'];
	   $results['privacy'] = $row['privacy'];
	   $results['totalReport'] = $totalReport;
	   $results['pendingReport'] = $pendingReport;
	   $results['ApproveReport'] = $ApproveReport;
	   $results['role'] = $role[0];

	   array_push($results, $row);
	}
	echo json_encode($results);
