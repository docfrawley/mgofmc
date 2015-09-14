<?php require_once("../includes/initialize.php"); 
session_start();

$username=isset($_POST['username']) ? $_POST['username'] : "" ;
$password=isset($_POST['password']) ? $_POST['password'] : "" ;


if ($username=='6853' && $password=='mgnews11') {
	$_SESSION['member'] = 'member';
	redirect_to('memberin.php');
} elseif ($username=='mgofmcadmin' && $password=='mgofmcin1!') {
	$_SESSION['member'] = 'admin';
	redirect_to('adminpage.php');
} else {
	$_SESSION['message']='That username and/or password is incorrect. Please try again.';
	redirect_to('login.php');
}

?>