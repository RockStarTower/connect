<?php

include ("../config.php");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$oneday = date('20y-m-d',strtotime("-0 days"));


$date = mysqli_real_escape_string($con, $_POST['date']);
$price = mysqli_real_escape_string($con, $_POST['price']);
$url = mysqli_real_escape_string($con, $_POST['url']);
$time = mysqli_real_escape_string($con, $_POST['time']);
$username = mysqli_real_escape_string($con, $_POST['username']);
$finished = mysqli_real_escape_string($con, $_POST['finished']);
$id = mysqli_real_escape_string($con, $_POST['id']);
$counter = mysqli_real_escape_string($con, $_POST['counter']);

$stime1 = mysqli_real_escape_string($con, $_POST['stime1']);
$stask1 = mysqli_real_escape_string($con, $_POST['stask1']);

$stime2 = mysqli_real_escape_string($con, $_POST['stime2']);
$stask2 = mysqli_real_escape_string($con, $_POST['stask2']);

$stime3 = mysqli_real_escape_string($con, $_POST['stime3']);
$stask3 = mysqli_real_escape_string($con, $_POST['stask3']);

$stime4 = mysqli_real_escape_string($con, $_POST['stime4']);
$stask4 = mysqli_real_escape_string($con, $_POST['stask4']);

$stime5 = mysqli_real_escape_string($con, $_POST['stime5']);
$stask5 = mysqli_real_escape_string($con, $_POST['stask5']);

$stime6 = mysqli_real_escape_string($con, $_POST['stime6']);
$stask6 = mysqli_real_escape_string($con, $_POST['stask6']);

$stime7 = mysqli_real_escape_string($con, $_POST['stime7']);
$stask7 = mysqli_real_escape_string($con, $_POST['stask7']);

$stime8 = mysqli_real_escape_string($con, $_POST['stime8']);
$stask8 = mysqli_real_escape_string($con, $_POST['stask8']);

$stime9 = mysqli_real_escape_string($con, $_POST['stime9']);
$stask9 = mysqli_real_escape_string($con, $_POST['stask9']);

$stime10 = mysqli_real_escape_string($con, $_POST['stime10']);
$stask10 = mysqli_real_escape_string($con, $_POST['stask10']);

$stime11 = mysqli_real_escape_string($con, $_POST['stime11']);
$stask11 = mysqli_real_escape_string($con, $_POST['stask11']);

$stime12 = mysqli_real_escape_string($con, $_POST['stime12']);
$stask12 = mysqli_real_escape_string($con, $_POST['stask12']);

$stime13 = mysqli_real_escape_string($con, $_POST['stime13']);
$stask13 = mysqli_real_escape_string($con, $_POST['stask13']);

$stime14 = mysqli_real_escape_string($con, $_POST['stime14']);
$stask14 = mysqli_real_escape_string($con, $_POST['stask14']);

$stime15 = mysqli_real_escape_string($con, $_POST['stime15']);
$stask15 = mysqli_real_escape_string($con, $_POST['stask15']);


if(isset($_POST['finished']) && 
   $_POST['finished'] == 'Yes') 
{
    $finished = "Completed";
}
else
{
    $finished = "Incomplete";
}    


mysqli_query($con, "UPDATE Custom SET description1 = '" . $stask1 . "', 
					date = '" . $oneday . "',
					description2 = '" . $stask2 . "', 
					description3 = '" . $stask3 . "', 
					description4 = '" . $stask4 . "', 
					description5 = '" . $stask5 . "',
					description6 = '" . $stask6 . "',
					description7 = '" . $stask7 . "',	
					description8 = '" . $stask8 . "',
					description9 = '" . $stask9 . "',
					description10 = '" . $stask10 . "',
					description11 = '" . $stask11 . "',
					description12 = '" . $stask12 . "',
					description13 = '" . $stask13 . "',
					description14 = '" . $stask14 . "',
					description15 = '" . $stask15 . "',
					time1 = '" . $stime1 . "',
					time2 = '" . $stime2 . "',
					time3 = '" . $stime3 . "',
					time4 = '" . $stime4 . "',
					time5 = '" . $stime5 . "',
					time6 = '" . $stime6 . "',
					time7 = '" . $stime7 . "',
					time8 = '" . $stime8 . "',
					time9 = '" . $stime9 . "',
					time10 = '" . $stime10 . "',
					time11 = '" . $stime11 . "',
					time12 = '" . $stime12 . "',
					time13 = '" . $stime13 . "',
					time14 = '" . $stime14 . "',
					time15 = '" . $stime15 . "', 
					time = '" . $time . "',
					finished = '" . $finished . "'
					WHERE counter = '" . $counter . "' ");
					
					
header("Location: http://23.254.136.54/~webdev/note/tasks.php");


mysqli_close($con);

?>