<?php
	session_start();
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$email = $_POST["email"];
	$pw = $_POST["password"];
	$infos = "$firstname,$lastname,$email,$pw\n";
	$users = file('user.txt', FILE_IGNORE_NEW_LINES);
	$emailCheck = false;
	foreach ($users as $line) {
		list($first_name, $last_name, $email_, $pw_) = explode(',', $line);
		if (strcasecmp($email, $email_) == 0) {
			$_SESSION["AccountExist"] = "Email address has been used!"; 
			//Email address has been used!
			$emailCheck = true;	
			header("Location: http://students.washington.edu/jx5/index.php");
			die();	
		}
	}
	 if (!$emailCheck) {
		file_put_contents("user.txt", $infos, FILE_APPEND);
		// Congrats, you signed up successfully!!
		header("Location: http://students.washington.edu/jx5/signupSuccess.html");
		die();
	}
?>