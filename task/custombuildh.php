<?php

include ("../config.php");


if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$date = mysqli_real_escape_string($con, $_POST['date']);
$price = mysqli_real_escape_string($con, $_POST['price']);
$url = mysqli_real_escape_string($con, $_POST['url']);
$time = mysqli_real_escape_string($con, $_POST['time']);
$username = mysqli_real_escape_string($con, $_POST['username']);
$finished = mysqli_real_escape_string($con, $_POST['finished']);
$id = mysqli_real_escape_string($con, $_POST['id']);

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

mysqli_query($con, "INSERT INTO Custom (date, price, url, time, username, id, finished, time1, description1, time2, description2, time3, description3, time4, description4, time5, description5, time6, description6, time7, description7, time8, description8, time9, description9, time10, description10, time11, description11, time12, description12, time13, description13, time14, description14, time15, description15) 
	VALUES ('$date', '$price', '$url', '$time', '$username', '$id', '$finished', '$stime1', '$stask1', '$stime2', '$stask2', '$stime3', '$stask3', '$stime4', '$stask4', '$stime5', '$stask5', '$stime6', '$stask6', '$stime7', '$stask7', '$stime8', '$stask8', '$stime9', '$stask9', '$stime10', '$stask10', '$stime11', '$stask11', '$stime12', '$stask12', '$stime13', '$stask13', '$stime14', '$stask14', '$stime15', '$stask15')");

	
header("Location: "root_url"tasks.php");
	
mysqli_close($con);

?>