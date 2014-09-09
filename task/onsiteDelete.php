<?php

//connect to database and functions file
include "../config.php";

if($_POST['id'])
{
	$id= mysqli_real_escape_string($con, $_POST['id']);
}
mysqli_query($con, "DELETE FROM onsites WHERE counter='$id'");



?>