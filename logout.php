<?php 

session_start();

$_SESSION = array();

session_destroy();//mato la sesion
header("Location: login.php");
?>