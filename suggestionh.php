<?php 
include ("config.php");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$date = $_POST['date'];
$type = $_POST['suggestionType'];
$username = $_POST['username'];
$comment = $_POST['overview'];
$status = $_POST['status'];

mysqli_query($con, "INSERT INTO feedback (Type, Comment, Username, Status, Date) 
VALUES ('$type', '$comment', '$username', '$status', '$date')");

mysqli_close($con);

echo "Your ticket has been submitted!";

?>


