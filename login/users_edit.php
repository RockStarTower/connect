<?php

//connect to database and functions file
include "../config.php";

if($_POST['user_id'])
{
$id=mysql_escape_String($_POST['user_id']);
$firstname=mysql_escape_String($_POST['first_name']);
$lastname=mysql_escape_String($_POST['last_name']);
$email=mysql_escape_String($_POST['email']);
$password=mysql_escape_String($_POST['password']);
$role=mysql_escape_String($_POST['role']);
$status=mysql_escape_String($_POST['status']);
mysqli_query($con, "UPDATE users SET firstname='$firstname',lastname='$lastname',email='$email', password='$password', role='$role', status='$status' WHERE id='$id'");
mysql_query($sql);

}


?>