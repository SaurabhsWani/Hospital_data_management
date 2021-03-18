<?php
$connection=new mysqli('127.0.0.1','root','','renaldb') or die("could not make connection".mysqli_connect_error());
function locations($loc,$msg){
	$_SESSION['Success']="Successful to ".$msg;  
	header("Location:".$loc.".php");  
}
function locationf($loc,$msg){
	$_SESSION['Status']="Fail to ".$msg;  
	header("Location:".$loc.".php");   
}
function locatione($loc){
	$_SESSION['Status']="Already Exist This Email! Use Different Email ";  
	header("Location:".$loc.".php");   
}
function isexist($table,$email)
{
$connection=new mysqli('127.0.0.1','root','','renaldb') or die("could not make connection".mysqli_connect_error());
	$query="SELECT email FROM $table WHERE email='$email'";
	$sql=mysqli_query($connection,$query);
	$passcode=mysqli_fetch_array($sql);
	if($passcode['email']==$email){return true;}else{return 0;}
}

?>