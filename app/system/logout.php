<?php 
require_once '../library/config.php';
$usrid = $_SESSION['system']['userid'];
$isOffline = mysql_query("UPDATE user SET online_stats = 0 WHERE user_id = '$usrid'");

unset($_SESSION['system']['userid']);
session_destroy();
header("Location: ../../index.php");