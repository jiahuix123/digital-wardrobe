<?php 
	session_start(); 
	if (isset($_SESSION["timeout"]) && $_SESSION["timeout"] + 5 * 60 < time()) {
		session_destroy();
	} else if (isset($_SESSION["email"])) {
		header("Location: http://students.washington.edu/jx5/main.html");
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
		<!--<div id="whole">-->
			<div id="signup" class="column">
				<form action="http://students.washington.edu/jx5/signupredirect.php" method="POST">
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
					</fieldset>
					<?php
						if (isset($_SESSION["AccountExist"])) {
							echo $_SESSION["AccountExist"];
							unset($_SESSION["AccountExist"]);
						}
					?>
				</form>
			<!--</div>-->

			<!--<div id = "login" class="column">-->
				<form id="loginform" action="http://students.washington.edu/jx5/loginredirect.php" method="post">
					
					<fieldset>
						<legend>Already have an account!</legend>
						<div class="columnname">Email:</div>
						
						<div>
							<input id="email" name="email" type="text" size="25"  autofocus="sutofocus">
						</div>
						
							<div class="columnname">Password:</div>
						
						<div>
							<input id="userpassword" name="password" type="password" size="25" maxlength="20">
						</div>

						<div>
							<input id="submitbutton" type="submit" value="Login" name="login">
						</div>
					</fieldset>
					<?php
						if (isset($_SESSION["pw_incorrect"])) {
							 echo $_SESSION["pw_incorrect"]; 
							 unset($_SESSION["pw_incorrect"]);
						}

						if (isset($_SESSION["noAccount"])) {
						echo $_SESSION["noAccount"];
							unset($_SESSION["noAccount"]);
						}
					?>
				</form>
			</div>
		
	<!--</div>-->
	</body>
</html>