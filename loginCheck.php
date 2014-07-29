<?php

$username;
$user_id;

session_start();
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
      // redirect to your login page
	  header("Location: index.php");
      exit();
	  

} else{
	
	$username = $_SESSION['username'];
	$user_id = $_SESSION['id'];
	$user_role = $_SESSION['role'];
	$manager = $_SESSION['manager'];
}


?>