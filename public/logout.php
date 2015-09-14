<?php require_once("../includes/initialize.php"); 
session_start();
session_unset();
session_destroy();
redirect_to('login.php');

?>