<?php 
	session_start(); 
	if (isset($_SESSION["timeout"]) && $_SESSION["timeout"] + 5 * 60 < time()) {
		session_destroy();
	} else if (isset($_SESSION["email"])) {
		header("Location: main.html");
		die();
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Digital Wardrobe</title>
		<link href="index.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<header>
			<div id="logo">
			</div>
		</header>
		<div id="signup" class="column">
			<form action="signupredirect.php" method="POST">
				<fieldset>
					<legend>Don't have an account yet?</legend>
					<div class="columnname">First Name:</div>
						<input type="text" name="firstname" size="25" /> </br>
					<div class="columnname">Last Name:</div>
						<input type="text" name="lastname" size="25" /> </br>

						<div class="columnname">Email:</div>
							<input type="text" name="email" size="25"/> </br>

					<div class="columnname">Password:</div>
						<input type="password" name="password" size="25" /> </br>
					<input type="submit" value="Sign me up!" />
					<?php
					if (isset($_SESSION["AccountExist"])) {
						echo "Email address has been used!";
						unset($_SESSION["AccountExist"]);
					}
					?>
				</fieldset>
			</form>
			<form id="loginform" action="loginredirect.php" method="post">				
				<fieldset>
					<legend>Already have an account!</legend>
					<div class="columnname">Email:</div>
					
					<div>
						<input id="email" name="email" type="text" size="25"  autofocus="sutofocus">
					</div>
					<div class="columnname">Password:</div>
					<input type="password" name="password" size="25" /> </br>
					<input type="submit" value="Log in!" />
					<?php
						if (isset($_SESSION["LoginFailed"])) {
							echo "Login failed!";
							unset($_SESSION["LoginFailed"]);
						}
					?>
				</fieldset>
					
			</form>
		</div>
	</body>
</html>