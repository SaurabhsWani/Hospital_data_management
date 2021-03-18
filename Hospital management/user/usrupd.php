<?php
include('security.php');
include('function.php');
$id1=$_SESSION['id'];
$role=$_SESSION['role'];
if (isset($_POST['updp'])) 
{
	$target="../image/".basename($_FILES['adimg']['name']);
	$image=$_FILES['adimg']['name'];
	$sql="UPDATE $role SET image='$image' WHERE id=$id1";
if(mysqli_query($connection,$sql)){move_uploaded_file($image,$target);locations("profile","Edit The Profile Image");} else{locationf("profile","Edit The Profile Image");}	
}

else if (isset($_POST['updfn'])) 
{
	$sql="UPDATE $role SET name='$_POST[First_Name]' WHERE id=$id1";
	if(mysqli_query($connection,$sql)){locations("profile","Edit The Name");} else{locationf("profile","Edit The Name");}
}
else if (isset($_POST['updeml'])) 
{
	$se2=$_POST['Email2'];
	$se=$_POST['Email'];
	$exist= ($se!=$se2) ? isexist($role,$se): 0;
	if(!$exist){
		$sql="UPDATE $role SET email='$se' WHERE id=$id1";
if(mysqli_query($connection,$sql)){locations("profile","Edit The Email");} else{locationf("profile","Edit The Email");}
	}
	else{locatione("profile");}
}
else if (isset($_POST['updpd'])) 
{
	$sql="UPDATE $role SET password='$_POST[Password]' WHERE id=$id1";
if(mysqli_query($connection,$sql)){locations("profile","Edit The Password");} else{locationf("profile","Edit The Password");}
}
else if (isset($_POST['updmn'])) 
{
	$sql="UPDATE $role SET mono='$_POST[mono]' WHERE id=$id1";
if(mysqli_query($connection,$sql)){locations("profile","Edit The Contact");} else{locationf("profile","Edit The Contact");}
}
?>