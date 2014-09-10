<?php

include ("../config.php");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$clientid = mysqli_real_escape_string($con, $_POST['clientid']);
$domain = mysqli_real_escape_string($con, $_POST['domain']);
$task = mysqli_real_escape_string($con, $_POST['task']);
$date = mysqli_real_escape_string($con, $_POST['date']);
$time = mysqli_real_escape_string($con, $_POST['time']);
$id = mysqli_real_escape_string($con, $_POST['id']);
$username = mysqli_real_escape_string($con, $_POST['username']);
$comment = mysqli_real_escape_string($con, $_POST['comment']);
$status = mysqli_real_escape_string($con, $_POST['status']);
$QAstatus = mysqli_real_escape_string($con, $_POST['QAstatus']);
$docs = $_POST['doc'];

$docs = json_encode($docs);

$QAstatus = mt_rand(1,100);

if ($QAstatus >= 50){

	$QAstatus = 'Pending QA';

} else {

	$QAstatus = 'Passed QA';


}

  mysqli_query($con, "INSERT INTO onsites (clientid, domain, task, date, time, id, username, comment, status, QAstatus, docs) 
 VALUES ('$clientid', '$domain', '$task', '$date', '$time', '$id', '$username', '$comment', '$status', '$QAstatus', '$docs')") or die ("not working"); 
 

header("location: ../tasks.php");



?>