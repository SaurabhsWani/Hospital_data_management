<?php
session_start();
require('dbconfig.php');
function destroy()
{
	if (isset($_COOKIE['email']) and isset($_COOKIE['pass'])) 
	{
		$email=$_COOKIE['email'];
		$pass=$_COOKIE['pass'];
		setcookie('email',$Email, time()-1);
		setcookie('pass',$_POST['Password'], time()-1);
	}	
$Email=$Password=$Password2=$_POST['Password']=$_POST['Email']="";
	header('Location: login.php');

}
if ($connection) 
{
	//echo "Database Connected";
}
else
{
	destroy();
}

if(isset($_POST['Email']) && isset($_POST['Password']))
{
}
else{destroy();}
?>