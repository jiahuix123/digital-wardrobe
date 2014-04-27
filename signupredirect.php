<?php
	session_start();
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

		$query = "SELECT userID, email FROM user WHERE email = '$email'"; 
		$result = $connection->query($query);
		$user = $result->fetch_assoc();

		if (empty($result) || empty($user)) { 
			// the row is empty
			// store all those data into one table call users
			$query = "INSERT INTO user(first_name, last_name, email, password) VALUES ('$firstname', '$lastname', '$email', '$password')" or
			die("Error: " . mysqli_error($connection));
			// go to this user's main page
			$_SESSION["AccountExist"] = false;
			unset($_SESSION["AccountExist"]);
			header("Location: main.html"); // create account successfully
			exit();
		} else {
			$_SESSION["AccountExist"] = true;
		 	// fail to create new account
			header("Location: index.php"); // 
			exit();
		}// check if the email address already exists
	}	
?>