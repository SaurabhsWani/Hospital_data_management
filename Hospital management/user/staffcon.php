<?php
include('security.php');
include('function.php');
$name=$_SESSION['fn'];
if(isset($_POST['addstf'])) 
{
	$email=$_POST['se'];
	if(!isexist('staff',$email))
	{
		$g=$_POST['sg'];
		$image = ($g == 'M') ? "male.png": "female.png";
		$sql="INSERT INTO staff (name,email,password,mono,branch,gender,createdby,editedby,image) VALUES('$_POST[sn]','$_POST[se]','$_POST[sp]','$_POST[smn]','$_POST[sb]','$_POST[sg]','$name','$name','$image')";
		if(mysqli_query($connection,$sql)){locations("staff","Add");} else{locationf("staff","Add");}
	}
	else{locatione("staff");}
}

if (isset($_POST['edit_stf'])) 
{  
	$id1 = $_POST['id'];
	$se2=$_POST['se2'];
	$se=$_POST['se'];
	$exist= ($se!=$se2) ? isexist('staff',$se): 0;
	if(!$exist){
	$sql="UPDATE staff SET name='$_POST[sn]',email='$_POST[se]',password='$_POST[sp]',branch='$_POST[sb]',mono='$_POST[smn]',editedby='$name' WHERE id=$id1";
	if(mysqli_query($connection,$sql)){locations("staff","Edit");} else{locationf("staff","Edit");}
	}
	else{locatione("staff");}
}

if (isset($_POST['del_stf'])) 
{ 
	$id1 = $_POST['del_id'];
	$sql="DELETE  FROM staff WHERE id=$id1 ";
	if(mysqli_query($connection,$sql)){locations("staff","Delete");} else{locationf("staff","Delete");}
}
?>