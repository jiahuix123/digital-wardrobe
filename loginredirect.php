<?php
	session_start();
if (isset($_POST["email"]) && isset($_POST["password"])) {
	$email = $_POST["email"];
	$password = $_POST["password"];
} else {
	$_SESSION["LoginFailed"] = true;
	header("Location: index.php");
	exit();
}

// connect to db
$connection = mysqli_connect(
		"localhost", 
		"root", "root", 
		"maindb", 8889) or die("Error connecting to DB: " . mysqli_error($connection));

$query = "SELECT userID, email FROM user WHERE email = '$email' AND password = '$password' LIMIT 1"; 
$result = $connection->query($query);
$user = $result->fetch_assoc();

if (empty($result) || empty($user)) {
	$_SESSION["LoginFailed"] = true;
	header("Location: index.php");
	exit();
} else {
	unset($_SESSION["LoginFailed"]);
	header("Location: main.html");
	exit();
}
?>
