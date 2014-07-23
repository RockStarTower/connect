<?php

include ("../config.php");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$clientid = $_POST['clientid'];
$domain = $_POST['domain'];
$task = $_POST['task'];
$time = $_POST['time'];
$comment = $_POST['comment'];
$date = $_POST['date'];
$username = $_POST['username'];
$id = $_POST['id'];

$status = $_POST['status'];


  mysqli_query($con, "INSERT INTO onsites (clientid, domain, task, time, comment, status, date, username, id ) 
 VALUES ('$clientid', '$domain', '$task', '$time', '$comment', '$status', '$date', '$username', '$id' )"); 
 

header("refresh:0; ". $root_url ."tasks.php");


mysqli_close($con);

?>