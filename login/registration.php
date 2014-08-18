<?php

include "../config.php";


$username = $_POST['username'];

$number = mysqli_query($con, 'SELECT id FROM users WHERE username = "'.$username.'"');


if(mysqli_num_rows($number) > 0) {
	echo "<span style='color: red;'>That username is already taken.</span>";
} else {

	$firstname = mysqli_real_escape_string($con, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($con, $_POST['lastname']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$role = mysqli_real_escape_string($con, $_POST['role']);
	$status = mysqli_real_escape_string($con, $_POST['status']);
	$manager = mysqli_real_escape_string($con, $_POST['manager']);
    $headers = ("From: connect@boostability.com");
    $subject = ("Boost Connect Account");
    $message = ("Welcome to Connect. Before you can access the website you need to have a manager approve your account. Here is your login information: \n Username: ".$username." \n Password:  ".$password.");
    

	if (mysqli_query($con, "INSERT INTO users (firstname, lastname, email, username, password, role, status, manager) 
		VALUES ('$firstname', '$lastname', '$email', '$username', '$password', '$role', '$status', '$manager')")){
		echo "<span style='color: green;'>Your account has been created! Before you can login, you need to contact a manager to approve your account.</span>";

        mail($email, $subject, $message, $headers);
        
	} else {

		echo "<span style='color: red;'>Sorry, something has gone wrong, please try again!</span>";
	}
	
}


?>

