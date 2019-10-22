<?php
include '../config.php';

$result = mysql_query("INSERT INTO roles SET level = 'new role'") or die (mysql_error());
