<?

require_once('functions.php');

$auth = false;

if(isset($_POST['submit'])) {
	$errors['login'] = $errors['password'] = $errors['password_again'] = '';

	$login = trim($_POST['login']);
	$password = trim($_POST['password']);

	$auth = authorization($login, $password);

	if($auth === true) {
		
		header("Location: index_auth.php");
	}
	else {
		$errors['full_error'] = $auth;
	}
}
?>
<html>
<head>
	<title>Authorization</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/css/registration.css">
	
	<script>
		window.onload = function() {
			document.getElementById('login').ontextInput = function() {
				alert(this.data);
			},
			focus = function() {
				alert("ok");
			}
			;
		};
	</script>
	
</head>
<body>


<?
if($auth !== true) {
?>
	<div id="full_error" class="error" style="display:
	<?
	echo $errors['full_error'] ? 'inline-block' : 'none';
	?>
	;">
	<?
	echo $errors['full_error'] ? $errors['full_error'] : '';
	?>
	</div>
	<div class="row main">
	<div class="main-login main-center">
	<form class="form-horizontal" action="" method="post">
		<div class="row form-group">
			<label for="login" class="cols-sm-2 control-label">Your login:</label>
			<div class="cols-sm-10">
			<div class="input-group">
			<input type="text" class="text form-control" name="login" id="login" value="<?=$fields['login'];?>" placeholder="Enter your login" />
			</div>
			<div class="error" id="login-error"><?=$errors['login'];?></div>
			</div>
		</div>
		<div class="row form-group">
			<label for="password" class="cols-sm-2 control-label">Your password</label>
			<div class="cols-sm-10">
			<div class="input-group">
			<input type="password" class="text form-control" name="password" id="password" value="" placeholder="Enter your Password"/>
		    
		</div>
		<div class="error" id="password-error"><?=$errors['password'];?></div>
		</div>
		</div>
		<div class="row">
			<input class="btn btn-primary btn-lg btn-block login-button" type="submit" name="submit" id="btn-submit" value="Authorization" />
		</div>
	</form>
	
	<p class="to_reg"><a class="btn btn-primary btn-lg btn-block" href="registration.php">Registration</a></p>
	
	</div></div>
<?
}

else {
	print $message;
}

?>
<script type="text/javascript" src="/js/bootstrap.js"></script>
</body>
</html>