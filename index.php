<?php 
	session_start(); 
	if (isset($_SESSION["timeout"]) && $_SESSION["timeout"] + 5 * 60 < time()) {
		session_destroy();
	} else if (isset($_SESSION["email"])) {
		header("Location: main.html");
		die();
	}

	// connect to db
	$connection = mysqli_connect(
		"localhost", 
		"root", "root", 
		"maindb", 8889) or die("Error connecting to DB: " . mysqli_error($connection));

	// store user's data into sql table
	// table's name is user
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$firstname = mysqli_real_escape_string(
			$connection, $_POST['firstname']);
		$lastname = mysqli_real_escape_string(
			$connection, $_POST['lastname']);
		$email = mysqli_real_escape_string(
			$connection, $_POST['email']);
		$password = mysqli_real_escape_string(
			$connection, $_POST['password']);
		// store all those data into one table call users
		$query = "INSERT INTO user(first_name, last_name, email, password) VALUES ('$firstname', '$lastname', '$email', '$password')" or
			die("Error: " . mysqli_error($connection));
		$result = $connection->query($query);
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
			<form action="" method="POST">
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
			<form id="loginform" action="loginredirect.php" method="post">				
				<fieldset>
					<legend>Already have an account!</legend>
					<div class="columnname">Email:</div>
					
					<div>
						<input id="email" name="email" type="text" size="25"  autofocus="sutofocus">
					</div>

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
			</div>

	</body>
</html>