<?php

include '../config.php';


	$email = $_POST['email'];

	$result = mysqli_query($con, "SELECT password, email FROM users WHERE email = '$email'");
	$row = mysqli_fetch_array($result);
	$password = $row['password'];
	$emailcheck = $row['email'];

	$emailcheck = strtolower($emailcheck);
	$email = strtolower($email);

	$subject = ("Boost Connect password reminder");
	$message = ("Your Boost Connect password is: $password");
	$headers = ("From: connect@boostability.com");

	if ($email == $emailcheck) {

		if(mail($email, $subject, $message, $headers)) { 
     		echo "<span style='color: green;'>Your password has been sent to your email!</span>"; 
     	} else{
     		echo "<span style='color: red;'>Sorry looks like something went wrong!</span>";
     	}

	} else {
		echo ("<span style='color: red;'>Invalid email address</span>");
	}


?>