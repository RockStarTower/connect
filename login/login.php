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
            $manager = $row['manager'];
        }

        // Check to see if username and password match
        if ($username_login==$dbusername && $password_login==$dbpassword) {

            if ($status == "active"){

			setcookie('username', $username_login, time()+60*60*24*30, '/');
            setcookie('id', $result, time()+60*60*24*30, '/');
            setcookie('role', $dbrole, time()+60*60*24*30, '/' );
            setcookie('manager', $manager, time()+60*60*24*30, '/' );

            echo true;

			}else{
                echo "<span style='color: red;'>Ask a manager to activate this account.</span>";
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