<?php include "connection.php";


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
		echo $row['username'];
	
	}
	
}



 ?>
