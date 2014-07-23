<?php

include ("../config.php");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$date = mysqli_real_escape_string($con, $_POST['date']);
$amount = mysqli_real_escape_string($con, $_POST['amount']);
$time = mysqli_real_escape_string($con, $_POST['time']);
$username = mysqli_real_escape_string($con, $_POST['username']);
$id = mysqli_real_escape_string($con, $_POST['id']);
$comment = mysqli_real_escape_string($con, $_POST['comment']);

mysqli_query($con, "INSERT INTO Blogs (date, amount, time, username, id, comment ) 
	VALUES ('$date', '$amount', '$time', '$username', '$id', '$comment' )");


header("Location: " . $root_url . "tasks.php");

mysqli_close($con);



?>