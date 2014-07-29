<?php

session_start();
unset($_SESSION["username"]); 
unset($_SESSION["id"]); 
unset($_SESSION["role"]); 
unset($_SESSION["manager"]); 
header("Location: ../index.php");

?>