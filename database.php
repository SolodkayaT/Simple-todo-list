<?
function connect() {

	$db_host = 'localhost';	
	$db_user = 'root';
	$db_password = '';
	$db_name = 'todolist';	
	
	$conn = mysql_connect($db_host, $db_user, $db_password) or die("<p>Could not connect to server! " . mysql_error() . ". Error on line " . __LINE__ . "</p>");

	$db = mysql_select_db($db_name, $conn) or die("<p>Could not connect to database! " . mysql_error() . ". Error on line " . __LINE__ . "</p>");
	
	}
	
?>