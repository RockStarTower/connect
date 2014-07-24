<?php

include '../config.php';

	$email = ($_POST['email']);

	$result = mysqli_query($con, "SELECT password FROM users WHERE email = '$email'");
	$row = mysqli_fetch_array($result);
	$password = $row[0];

	$check = mysqli_query($con, "SELECT email FROM users WHERE email = '$email'");
	$rows = mysqli_fetch_array($check);
	$emailcheck = $rows[0];

	$emailcheck = strtolower($emailcheck);
	$email = strtolower($email);

	$subject = ("Boost Connect password reminder");
	$message = ("Your Boost Connect password is: $password");
	$headers = ("From: connect@boostability.com");

	if ($email == $emailcheck) {
		mail ( $email , $subject, $message, $headers) or die ("Sorry looks like something went wrong!");
	} else {
		echo ("buzz off");
	}


?>