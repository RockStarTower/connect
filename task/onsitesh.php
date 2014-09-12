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

if ($QAstatus >= 66){

	$QAstatus = 'Pending QA';

} else {

	$QAstatus = 'Passed QA';

}

$OwnerRand = mt_rand(1,7);

if ($OwnerRand == 1){
	if ($username != "rwilson") {
		$QAowner = "rwilson";
	} else {
		$QAowner = "towens";
	}
} else if ($OwnerRand == 2) {
	if ($username != "towens") {
		$QAowner = "towens";
	} else {
		$QAowner = "jdiaz";
	}
} else if ($OwnerRand == 3) {
	if ($username != "jdiaz") {
		$QAowner = "jdiaz";
	} else {
		$QAowner = "bpendleton";
	}
} else if ($OwnerRand == 4) {
	if ($username != "bpendleton") {
		$QAowner = "bpendleton";
	} else {
		$QAowner = "swilson";
	}
} else if ($OwnerRand == 5) {
	if ($username != "swilson") {
		$QAowner = "swilson";
	} else {
		$QAowner = "afunk";
	}
} else if ($OwnerRand == 6) {
	if ($username != "afunk") {
		$QAowner = "afunk";
	} else {
		$QAowner = "alangford";
	}
} else if ($OwnerRand == 7) {
	if ($username != "alangford") {
		$QAowner = "alangford";
	} else {
		$QAowner = "rwilson";
	}
}


  mysqli_query($con, "INSERT INTO onsites (clientid, domain, task, date, time, id, username, comment, status, QAstatus, docs, QAowner) 
 VALUES ('$clientid', '$domain', '$task', '$date', '$time', '$id', '$username', '$comment', '$status', '$QAstatus', '$docs', '$QAowner')") or die ("not working"); 
 

header("location: ../tasks.php");



?>