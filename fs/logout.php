<?php
session_start();

session_unset();
session_destroy();
header("location:/fs/login.php");

exit();
?>