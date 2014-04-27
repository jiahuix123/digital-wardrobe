<?php
session_start();
$email = $_POST["email"];
$password = $_POST["password"];
$users = file('user.txt', FILE_IGNORE_NEW_LINES);
$findName = false;

// validate email address 
if (!preg_match("^[\S]+@[\S]+\.[\S]+$^", $email)) {
	print "Error, invalid email address";
}

// validate user name
if (!preg_match("^[a-zA-Z0-9_-]{3,20}$^", users)) {
	print "Error, invalid user name";
}
foreach ($users as $line) {
	list($first_name, $last_name, $email_, $pw_) = explode(',', $line);
	if (strcasecmp($email, $email_) == 0) {
		$findName = true;
		if (strcasecmp($password, $pw_) == 0) {
			//Log in successfully!
			$_SESSION["email"] = $_POST["email"];
			header("Location: main.html");
			die();
		} else {
			$_SESSION["pw_incorrect"] = "Wrong password!";
			//password incorrect
			header("Location: index.php");
			die();
		}
	} 
}

if (!$findName) {
	$_SESSION["noAccount"] = "Account does not exist, sign up please!";	
//User does not exist!
	header("Location: index.php");
	die();
}
?>
