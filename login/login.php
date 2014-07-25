<?php

include ('../config.php');

$username_login = $_POST["username"];
$password_login = $_POST["password"];


if ($username_login && $password_login) {

    $query2 = mysqli_query($con, 'SELECT * FROM users WHERE username = "'.$username_login.'"');
    $numrow = mysqli_num_rows($query2);


   if ($numrow != 0) {
        
        while ($row = mysqli_fetch_assoc($query2)) {

            $dbusername = $row['username'];
            $dbpassword = $row['password'];
			$result = $row['id'];
			$dbrole = $row['role'];
            $status = $row['status'];
        }

        // Check to see if username and password match
        if ($username_login==$dbusername && $password_login==$dbpassword) {

            if ($status == "active"){

			session_start();
			$_SESSION['username'] = $username_login;
			$_SESSION['id'] = $result;
			$_SESSION['role'] = $dbrole;
            echo true;

			}else{
                echo "<span style='color: red;'>Your account needs to be activated by a manager.</span>";
            }
        } else {
            echo "<span style='color: red;'>Sorry $username_login. Incorrect password!</span>";
        }  

    } else{

        echo "<span style='color: red;'>Sorry, we didn't find that username!</span>";
    }
} 
 

mysqli_close($con);

?>