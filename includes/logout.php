<?php 
	session_start();
	$_SESSION['user_id']=null;
	$_SESSION['user_firstname']=null;
	header("Location:../index.php");
	exit();
 ?>