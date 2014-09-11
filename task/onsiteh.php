<?php

//connect to database and functions file
include "../config.php";

if($_POST['id'])
{
	$id= mysqli_real_escape_string($con, $_POST['id']);
	$comment= mysqli_real_escape_string($con, $_POST['comment']);
	$role= mysqli_real_escape_string($con, $_POST['status']);
	$username= mysqli_real_escape_string($con, $_POST['username']);
	$orgUser= mysqli_real_escape_string($con, $_POST['orgUser']);
	$taskType= mysqli_real_escape_string($con, $_POST['taskType']);
}

mysqli_query($con, "UPDATE onsites SET QAcomment='$comment',QAstatus='$role', QAby='$username' WHERE counter='$id'");

	if ($role == "Kickback"){

		mysqli_query($con, "INSERT INTO kickback SET QAby='$username', QAfor='$orgUser', QAcomment='$comment', task='$taskType' ");
		
	}




?>