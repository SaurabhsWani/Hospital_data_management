<?php
include('security.php');
include('function.php');
$name=$_SESSION['fn'];
if(isset($_POST['adddr'])) 
{
	$email=$_POST['se'];
	if(!isexist('doctor',$email))
	{
		$g=$_POST['sg'];
		$image = ($g == 'M') ? "male.png": "female.png";
		$sql="INSERT INTO doctor (name,email,password,mono,branch,gender,createdby,editedby,image) VALUES('$_POST[sn]','$_POST[se]','$_POST[sp]','$_POST[smn]','$_POST[sb]','$_POST[sg]','$name','$name','$image')";
		if(mysqli_query($connection,$sql)){locations("doctor","Add");} else{locationf("doctor","Add");}
	}
	else{locatione("doctor");}
}
if (isset($_POST['edit_dr'])) 
{  
	$id1 = $_POST['id'];$se2=$_POST['se2'];
	$se=$_POST['se'];
	$exist= ($se!=$se2) ? isexist('doctor',$se): 0;
	if(!$exist){
		$sql="UPDATE doctor SET name='$_POST[sn]',email='$_POST[se]',password='$_POST[sp]',branch='$_POST[sb]',mono='$_POST[smn]',editedby='$name' WHERE id=$id1";
		if(mysqli_query($connection,$sql)){locations("doctor","Edit");} else{locationf("doctor","Edit");}
	}
	else{locatione("doctor");}
}

if (isset($_POST['del_dr'])) 
{ 
	$id1 = $_POST['del_id'];
	$sql="DELETE  FROM doctor WHERE id=$id1 ";
	if(mysqli_query($connection,$sql)){locations("doctor","Delete");} else{locationf("doctor","Delete");}
}
?>