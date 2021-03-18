<?php
include('security.php');
if (isset($_POST['logout_btn'])) 
{ 
$role=$_SESSION['role'];
	$Email=$_SESSION['email'];
	$sql="UPDATE $role SET status='off' WHERE email='$Email'";
	if(mysqli_query($connection,$sql))
	{
	session_destroy();
	session_unset();
	session_write_close();
	if (isset($_COOKIE['email']) and isset($_COOKIE['pass'])) 
	{
		$email=$_COOKIE['email'];
		$pass=$_COOKIE['pass'];
		setcookie('email',$Email, time()-1);
		setcookie('pass',$_POST['Password'], time()-1);
	}
		header('Location:login.php');
	}
}
?>