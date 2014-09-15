<?php
include "../config.php";

$username = mysqli_real_escape_string($con, $_POST['username']);
$text = mysqli_real_escape_string($con, $_POST['text']);

mysqli_query($con, "UPDATE users SET notes='$text' WHERE username='$username'");

?>