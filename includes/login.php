<?php include "connection.php";
session_start();

if(isset($_POST['login']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];

	$username=mysqli_real_escape_string($connection,$username); 
	$password=mysqli_real_escape_string($connection,$password); 


	$login_query="SELECT * from users WHERE username='$username' and userpassword='$password'";
	$login_result=mysqli_query($connection,$login_query);
	if(!$login_result)
	{
		 die("no result".mysqli_error($connection));
	}

	while($row=mysqli_fetch_assoc($login_result))
	{
		$db_userid=$row['user_id'];
		$db_username= $row['username'];
		$db_password= $row['userpassword'];
		$db_user_firstname=$row['user_firstname'];
		$db_user_role=$row['user_role'];
	}
	
	if ($db_username===$username && $db_password===$password) 
	{
		$_SESSION['user_id']=$db_userid;
		$_SESSION['user_firstname']=$db_user_firstname;
		$_SESSION['user_role']=$db_user_role;
		header("Location:../admin");
		exit();
	}
	else
	{
		header("Location:../index.php");
	}
}



 ?>
