<?php
	include("includes/config.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");

  $account = new Account($con);
  include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");
	
	function getInputValue($name) {
		if(isset($_POST[$name])) {
			echo $_POST[$name];
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Register for Slotify</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="./assets/css/register.css">
	<script src="https://kit.fontawesome.com/8f9a3ae12e.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="./assets/js/register.js"></script>
</head>
<body class="register">

<?php 

	if(isset($_POST['registerButton'])) {
		echo '<script>
						$(document).ready(function() {
							$("#loginForm").hide();
							$("#registerForm").show();
						});
					</script>';
	} else {
		echo '<script>
						$(document).ready(function() {
							$("#loginForm").show();
							$("#registerForm").hide();
						});
					</script>';
	}

?>
<div class="login-background">
<div class="login-wrapper">
	<div id="inputContainer">
		<form id="loginForm" action="register.php" method="POST">
			<h2>Login to your account</h2>
			<?php echo $account->getError(Constants::$loginError); ?>
			<p>
				<label for="loginUsername">Username</label>
				<input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. bartSimpson" required>
			</p>
			<p>
				<label for="loginPassword">Password</label>
				<input id="loginPassword" name="loginPassword" type="password" required>
			</p>

			<button type="submit" name="loginButton">LOG IN</button>

			<div class="has-account-text">
				<span id="hideLogin">Don't have an account yet? Sign up here.</span>
			</div>
			
		</form>

		<form id="registerForm" action="register.php" method="POST">
			<h2>Sign up for an account</h2>
			<p>
				<?php echo $account->getError(Constants::$usernameLength); ?>
				<?php echo $account->getError(Constants::$usernameTaken); ?>
				<label for="username">Username</label>
				<input id="username" value="<?php getInputValue('username'); ?>" name="username" type="text" placeholder="e.g. bartSimpson" required>
			</p>
			<p>
				<?php echo $account->getError(Constants::$firstNameLength); ?>
				<label for="firstName">First Name</label>
				<input id="firstName" value="<?php getInputValue('firstName'); ?>" name="firstName" type="text" placeholder="Bart" required>
			</p>
			<p>
				<?php echo $account->getError(Constants::$lastNameLength); ?>
				<label for="lastName">Last Name</label>
				<input id="lastName" value="<?php getInputValue('lastName'); ?>" name="lastName" type="text" placeholder="Simpson" required>
			</p>
			<p>
				<?php echo $account->getError(Constants::$emailDoesNotMatch); ?>
				<?php echo $account->getError(Constants::$emailFormat); ?>
				<?php echo $account->getError(Constants::$emailTaken); ?>
				<label for="email">Email</label>
				<input id="email" value="<?php getInputValue('email'); ?>" name="email" type="email" placeholder="email@email.com" required>
			</p>
			<p>
				<label for="confirmEmail">Confirm Email</label>
				<input id="confirmEmail" value="<?php getInputValue('confirmEmail'); ?>" name="confirmEmail" type="email" placeholder="email@email.com" required>
			</p>
			<p>
				<?php echo $account->getError(Constants::$passwordDoesNotMatch); ?>
				<?php echo $account->getError(Constants::$passwordFormat); ?>
				<?php echo $account->getError(Constants::$passwordLength); ?>
				<label for="registerPassword">Password</label>
				<input id="registerPassword" value="<?php getInputValue('registerPassword'); ?>" name="registerPassword" type="password" required>
			</p>
			<p>
				<label for="registerPassword2">Confirm Password</label>
				<input id="registerPassword2" value="<?php getInputValue('registerPassword2'); ?>" name="registerPassword2" type="password" required>
			</p>

			<button type="submit" name="registerButton">Sign up</button>
			<div class="has-account-text">
				<span id="hideRegister">Already have an account? Log in here.</span>
			</div>
		</form>
	</div>
	<div class="content">
			<h1>Get great music, <br/> right now</h1>
			<div class="tag-line">Listen to loads of songs for free.</div>
			<ul>
				<li><i class="fas fa-check"></i>Discover music you'll fall in love with</li>
				<li><i class="fas fa-check"></i>Create your own playlist</li>
				<li><i class="fas fa-check"></i>Follow artist to keep up to date</li>
			</ul>
		</div>
	</div>
</div>
</body>
</html>