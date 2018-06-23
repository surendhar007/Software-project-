<?php
include('config.php');
session_start();
$email = $_POST["Email"];
$pass = $_POST["Password"];
$qry=mysqli_query($con,"select * from tbl_admin_login where username='$email' and password='$pass'");
if(mysqli_num_rows($qry))
{
	$usr=mysqli_fetch_array($qry);
	if($usr['user_type']==2)
	{
		$_SESSION['user']=$usr['user_id'];
		if(isset($_SESSION['show']))
		{
			header('location:admin_index.php');
		}
	}
	else
	{
		$_SESSION['error']="Login Failed!";
		header("location:admin_login.php");
	}
	
}
else
{
	$_SESSION['error']="Login Failed!";
	header("location:admin_login.php");
}
?>