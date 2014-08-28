<?php

//connect to database and functions file
include "../config.php";

if($_POST['id'])
{
	$id= mysqli_real_escape_string($con, $_POST['id']);
	$comment= mysqli_real_escape_string($con, $_POST['comment']);
	$role= mysqli_real_escape_string($con, $_POST['status']);
}
mysqli_query($con, "UPDATE onsites SET comment='$comment',QAstatus='$role' WHERE counter='$id'");



?>