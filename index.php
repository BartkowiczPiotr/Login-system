<?php
session_start();

if(isset($_SESSION['user_id'])){
	header('Location: App/');
};

?>

<!DOCTYPE html>
<html lang="en">
<head>

<title>Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Language" content="en-US">

<meta name="robots" content="noindex, nofollow">
<meta name="viewport" content="wclassth=device-wclassth, initial-scale=1.0" />

<link rel="stylesheet" href="App/css/body.css"/>
<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet"> 
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

</head>
<body>
		<div class="login-body">
			<div class="login">
				<div class="login__left">
					<div class="login-form">
						<h2 class="login-form__header">Login</h2>
						<div class="alert-label"></div>
							<input class="login-form__input" id="login-form__input--email" placeholder="Email" type="email" name="user-email"/>
							<input class="login-form__input" id="login-form__input--password" placeholder="Password" type="password" name="user-password"/>
							<div class="login-form__link">
								<a href="">Forgot password?</a>
							</div>
							<button type="button" class="login-form__button" id="login-form__button">Login</button>
						<div class="login-form__footer">
							<p>You don't have an account yet? <a href="">Create it!</a></p>
						</div>
					</div>
				</div>
				<div class="login__right">
					<h1 class="login__claim">Your extra claim goes here</h1>
				</div>
			</div>
			<div class="login-body__footer">
				<img class="liquid" src="App/assets/city-landscape.png" alt="body background image"/>
			</div>
		</div>

<script type="text/javascript" src="App/js/AllertLabel.js"></script>
<script type="text/javascript" src="App/js/controler.js"></script>
</body>
</html>