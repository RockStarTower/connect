<?php

//connect to database and functions file
include "../config.php";

if($_POST['id'])
{
	$id= mysqli_real_escape_string($con, $_POST['id']);
	$comment= mysqli_real_escape_string($con, $_POST['comment']);
	$role= mysqli_real_escape_string($con, $_POST['status']);
	$domain= mysqli_real_escape_string($con, $_POST['domain']);
	$task= mysqli_real_escape_string($con, $_POST['task']);
	$clientid= mysqli_real_escape_string($con, $_POST['clientid']);
	$time= mysqli_real_escape_string($con, $_POST['time']);
}
mysqli_query($con, "UPDATE onsites SET comment='$comment',status='$role',domain='$domain',task='$task',clientid='$clientid', time='$time' WHERE counter='$id'");



?>