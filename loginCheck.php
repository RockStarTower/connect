<?php

$username;
$user_id;


if (!isset($_COOKIE['username']) || empty($_COOKIE['username'])) {
      // redirect to your login page
	  header("Location: index.php");
      exit();
	  

} else{
	
	$username = $_COOKIE['username'];
	$user_id = $_COOKIE['id'];
	$user_role = $_COOKIE['role'];
	$manager = $_COOKIE['manager'];
}


?>