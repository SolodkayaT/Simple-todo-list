<?

require_once('database.php');

function checkLogin($str) {
	$error = '';
	
	if(!$str) {
		$error = 'Enter your login';
		return $error;
	}

	$pattern = '/^[-_.a-z\d]{4,16}$/i';	
	$result = preg_match($pattern, $str);
	
	if(!$result) {
		$error = 'Too short or cannot use some symbols';
		return $error;
	}
	
	return true;
}

function checkPassword($str) {
	$error = '';
	
	if(!$str) {
		$error = 'Enter your password';
		return $error;
	}
	
	$pattern = '/^[_!)(.a-z\d]{6,16}$/i';	
	$result = preg_match($pattern, $str);
	
	if(!$result) {
		$error = 'Too short or cannot use some symbols';
		return $error;
	}
	
	return true;
}

function registration($login, $password) {
	$error = '';
	
	if(!$login) {
		$error = 'No login';
		return $error;
	} 
	elseif(!$password) {
		$error = 'No password';
		return $error;
	}
	
	connect();
	
	$sql = "SELECT `id` FROM `users` WHERE `login`='" . $login . "'";
	$query = mysql_query($sql) or die("<p>Cannot query: " . mysql_error() . ". Error " . __LINE__ . "</p>");

	if(mysql_num_rows($query) > 0) {
		$error = 'This login is not empty!';
		return $error;
	}
	$sql = "INSERT INTO `users` 
			(`id`,`login`,`password`) VALUES 
			(NULL, '" . $login . "','" . $password . "')";
	$query = mysql_query($sql) or die("<p>Cannot to add user: " . mysql_error() . ". Error " . __LINE__ . "</p>");
	
	mysql_close();
	
	return true;
}


function authorization($login, $password) {

	$error = '';
	

	if(!$login) {
		$error = 'Enter your login';
		return $error;
	} 
	elseif(!$password) {
		$error = 'Enter your password';
		return $error;
	}

	connect();
	

	$sql = "SELECT `id` FROM `users` WHERE `login`='".$login."' AND `password`='".$password."'";
	$query = mysql_query($sql) or die("<p>Cannot query: " . mysql_error() . ". Error " . __LINE__ . "</p>");
	
	if(mysql_num_rows($query) == 0)	{
		$error = 'A user with such data is not registred!';
		return $error;
	}
	
	session_start();

	$_SESSION['login'] = $login;
	$_SESSION['password'] = $password;
	
	mysql_close();
	
	return true;
}

function checkAuth($login, $password) {
	if(!$login || !$password)	return false;
	
	connect();
	
	$sql = "SELECT `id` FROM `users` WHERE `login`='".$login."' AND `password`='".$password."'";
	$query = mysql_query($sql) or die("<p>Cannot query " . mysql_error() . ". Error " . __LINE__ . "</p>");
	
	if(mysql_num_rows($query) == 0)	{
		return false;
	}
	
	mysql_close();
	
	return true;
}

?>