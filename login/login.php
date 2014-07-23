<?php

include ('../config.php');

$username_login = $_POST["username"];
$password_login = $_POST["password"];


if ($username_login && $password_login) {

    $query2 = mysqli_query($con, 'SELECT * FROM users WHERE username= "'.$username_login.'"');
    $numrow = mysqli_num_rows($query2);

   if ($numrow != 0) {
        // LOGIN code
        while ($row = mysqli_fetch_assoc($query2)) {
            $dbusername = $row['username'];
            $dbpassword = $row['password'];
			$result = $row['id'];
			$dbrole = $row['role'];
        }

        // Check to see if username and password match
        if ($username_login==$dbusername && $password_login==$dbpassword) {
			session_start();
			$_SESSION['username'] = $username_login;
			$_SESSION['id'] = $result;
			$_SESSION['role'] = $dbrole;
			
			header("Location: " . $root_url . "dashboard.php");
        }	
        else {
            echo "Sorry $username_login. Incorrect password!";
        }  

    } else{

        echo "Sorry, we didn't find that username!";
    }
	
} 

mysqli_close($con);

?>