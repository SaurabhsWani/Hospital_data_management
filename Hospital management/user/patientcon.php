<?php
include('security.php');
include('function.php');
$id=$_SESSION['id'];
if(isset($_POST['addpt'])) 
{
	$sql="INSERT INTO patient (name,pcpp,age,gender,dob,createdby) VALUES('$_POST[pn]','$_POST[pcpp]','$_POST[pa]','$_POST[pg]','$_POST[pdob]','$id')";
	if(mysqli_query($connection,$sql))
	{
		$sqlne = "SELECT noe FROM staff WHERE id=$id";
		$result = mysqli_query($connection,$sqlne);
		while($enr = mysqli_fetch_assoc($result))
		{
			$noe = $enr['noe'];
		}
		$noe+=1;
		$sqli="UPDATE staff SET noe='$noe' WHERE id='$id'";
		if(mysqli_query($connection,$sqli))
			{locations("patient","Add");}
		} else{locationf("patient","Add");}
	}

// if (isset($_POST['edit_br'])) 
// {  
//  $id1 = $_POST['id'];
//  $sql="UPDATE patient SET name='$_POST[bn]',cpp='$_POST[cpp]',editedby='$id' WHERE id=$id1";
//  if(mysqli_query($connection,$sql)){locations("patient","Edit");} else{locationf("patient","Edit");}
// }

// if (isset($_POST['del_br'])) 
// { 
//  $id1 = $_POST['del_id'];
//  $sql="DELETE  FROM patient WHERE id=$id1 ";
//  if(mysqli_query($connection,$sql)){locations("patient","Delete");} else{locationf("patient","Delete");}
// }
	?>