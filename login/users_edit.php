<?php

//connect to database and functions file
include "../config.php";

if($_POST['user_id'])
{
$id=mysql_escape_String($_POST['user_id']);
$firstname=mysql_escape_String($_POST['first_name']);
$lastname=mysql_escape_String($_POST['last_name']);
$email=mysql_escape_String($_POST['email']);
$role=mysql_escape_String($_POST['role']);
$status=mysql_escape_String($_POST['status']);
$manager=mysql_escape_String($_POST['manager']);
mysqli_query($con, "UPDATE users SET firstname='$firstname',lastname='$lastname',email='$email', role='$role', status='$status', manager='$manager' WHERE id='$id'");
mysql_query($sql);

}


?>