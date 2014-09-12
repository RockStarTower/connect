<?php

setcookie('username', "", time()-3600, '/');
setcookie('id', "", time()-3600, '/');
setcookie('role', "", time()-3600, '/');
setcookie('manager', "", time()-3600, '/');

header("Location: ../index.php");

?>