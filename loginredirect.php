<?php
session_start();
$email = $_POST["email"];
$password = $_POST["password"];
// validate email address 
if (!preg_match("^[\S]+@[\S]+\.[\S]+$^", $email)) {
	print "Error, invalid email address";
}


// connect to db
$connection = mysqli_connect(
		"localhost", 
		"root", "root", 
		"maindb", 8889) or die("Error connecting to DB: " . mysqli_error($connection));

$query = "SELECT * FROM user WHERE email='$email'" or
	die("Error: " . mysqli_error($connection));
$result = $connection->query($query);
$numrows = mysql_num_rows($query);

if ($numrows != 0) {
	while ($row = mysql_fetch_assoc($query)) {		
		if ($row['email']==$email && $row['password']==$password) {
		} else {
			die("incorrect username/password!");
		}
	}
} else {
	$_SESSION["noAccount"] = "Account does not exist, sign up please!";	
	//User does not exist!
	header("Location: index.php");
	die();	
}
?>
