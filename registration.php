<?
require_once('functions.php');
$errors = array();
$fields = array();

$reg = false;

if(isset($_POST['submit'])) {

	$errors['login'] = $errors['password'] = $errors['password_again'] = '';
	
	$fields['login'] = trim($_POST['login']);
	$password = trim($_POST['password']);
	$password_again = trim($_POST['password_again']);
	
	$errors['login'] = checkLogin($fields['login']) === true ? '' : checkLogin($fields['login']);
	
	$errors['password'] = checkPassword($password) === true ? '' : checkPassword($password);
	
	$errors['password_again'] = (checkPassword($password) === true && $password === $password_again) ? '' : 'The entered passwords do not match';
	
	if($errors['login'] == '' && $errors['password'] == '' && $errors['password_again'] == '') {
		$reg = registration($fields['login'], $password);
		
		if($reg === true) {
			
			header("Location: login.php");
		}
		else {
			$errors['full_error'] = $reg;
		}
	}
}
?>
<html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="/css/bootstrap.css">

		<link rel="stylesheet" type="text/css" href="/css/registration.css">
	<title>Registration</title>
</head>
<body>
<?

if($reg !== true) {
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
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 id="rubygarage">Registration TODO List</h1>
	               		<hr />
	               	</div>
	            </div> 
				<div class="main-login main-center">
	<form class="form-horizontal" action="" method="post">
		<div class=" row form-group">
							<label for="login" class="cols-sm-2 control-label">Enter your login:</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class=" text form-control" name="login" id="login" value="<?=$fields['login'];?>"  placeholder="Enter your login"/>
								
								</div>
								<div class="error" id="login-error"><?=$errors['login'];?></div>
							</div>
						</div>

			<div class=" row form-group">
							<label for="password" class="cols-sm-2 control-label">Enter your password:</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="text form-control" name="password" id="password" value=""  placeholder="Enter your Password"/>
								   
								</div>
								 <div class="error" id="password-error"><?=$errors['password'];?></div>
							</div>
						</div>
		
		<div class="row form-group">
							<label for="password_again" class="cols-sm-2 control-label">Confirm Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="text form-control" name="password_again" id="password_again" value=""  placeholder="Confirm your Password"/>
								
								</div>
								<div class="error" id="password_again-error"><?=$errors['password_again'];?></div>
							</div>
						</div>
	    <div class="row form-group ">

						
						<input class="btn btn-primary btn-lg btn-block login-button" type="submit" name="submit" id="btn-submit" value="Register" />
						<input class="btn btn-primary btn-lg btn-block login-button" type="reset" name="reset" id="btn-reset" value="Clear" />
						</div>

	</form>
	</div>
	</div>
<?
}	
else {
	print $message;
}
?>
<script type="text/javascript" src="/js/bootstrap.js"></script>
</body>
</html>