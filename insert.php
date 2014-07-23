<?php

include "config.php";

$username = $_POST['username'];

$number = mysqli_query($con, 'SELECT id FROM users WHERE username = "'.$username.'"');


if(mysqli_num_rows($number) > 0) {
	echo "name already exists";
} else {

	$firstname = mysqli_real_escape_string($con, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($con, $_POST['lastname']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$role = mysqli_real_escape_string($con, $_POST['role']);

	mysqli_query($con, "INSERT INTO users (firstname, lastname, email, username, password, role) 
		VALUES ('$firstname', '$lastname', '$email', '$username', '$password', '$role')");
		
	header("Refresh: 5; url=". $root_url ."admin.php");
	echo'Your account is created, please log in once the page refreshes in 5 seconds.';

}

	
mysqli_close($con);

?>