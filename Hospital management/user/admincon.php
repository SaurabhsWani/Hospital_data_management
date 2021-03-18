<?php
include('security.php');
include('function.php');
$name=$_SESSION['fn'];
if(isset($_POST['addad'])) 
{
	$email=$_POST['ae'];
	if(!isexist('admin',$email))
	{
		$ea=$an=$da=$_POST['AA'];
		$g=$_POST['ag'];
		$image = ($g == 'M') ? "male.png": "female.png";
		$sql="INSERT INTO admin (name,email,password,mono,gender,createdby,editedby,image,ea,an,da) VALUES('$_POST[an]','$_POST[ae]','$_POST[ap]','$_POST[amn]','$_POST[ag]','$name','$name','$image','$ea','$an','$da')";
		if(mysqli_query($connection,$sql)){locations("admin","Add");} else{locationf("admin","Add");}
	}
	else{locatione("admin");}
}
if (isset($_POST['edit_ad'])) 
{  
	$id1 = $_POST['id'];
	$se2=$_POST['se2'];
	$ea=$an=$da=$_POST['AA'];
	$se=$_POST['se'];
	$exist= ($se!=$se2) ? isexist('admin',$se): 0;
	if(!$exist){
		$sql="UPDATE admin SET name='$_POST[an]',email='$_POST[ae]',password='$_POST[ap]',mono='$_POST[amn]',editedby='$name',ea='$ea',an='$an',da='$da' WHERE id=$id1";
		if(mysqli_query($connection,$sql)){locations("admin","Edit");} else{locationf("admin","Edit");}
	}
	else{locatione("admin");}
}

if (isset($_POST['del_ad'])) 
{ 
	$id1 = $_POST['del_id'];
	$sql="DELETE  FROM admin WHERE id=$id1 ";
	if(mysqli_query($connection,$sql)){locations("admin","Delete");} else{locationf("admin","Delete");}
}
?>