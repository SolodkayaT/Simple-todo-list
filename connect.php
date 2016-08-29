<?php
	$server = "localhost";
	$db_name = "todolist";
	$db_user = "root";
	$db_pass = "";
	

	mysql_connect($server, $db_user, $db_pass) or die("Could not connect to server!");
	mysql_select_db($db_name) or die("Could not connect to database!");
?>