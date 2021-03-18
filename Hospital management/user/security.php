<?php
session_start();
function destroy()
{
	session_destroy();
	session_unset();
	if (isset($_COOKIE['email']) and isset($_COOKIE['pass'])) 
	{
		$email=$_COOKIE['email'];
		$pass=$_COOKIE['pass'];
		setcookie('email',$Email, time()-1);
		setcookie('pass',$_POST['Password'], time()-1);
	}
	header('Location: login.php');

}
require('dbconfig.php');

if ($connection) 
{
	//echo "Database Connected";
}
else
{
	destroy();
}

if(isset($_SESSION['email']) && (isset($_SESSION['fn']) && isset($_SESSION['email'])))
{
}
else{destroy();}
?>