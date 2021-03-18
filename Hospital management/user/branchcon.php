<?php
include('security.php');
include('function.php');
$name=$_SESSION['fn'];
if(isset($_POST['addbr'])) 
{
 $sql="INSERT INTO branch (name,cpp,createdby,editedby) VALUES('$_POST[bn]','$_POST[cpp]','$name','$name')";
 if(mysqli_query($connection,$sql)){locations("branch","Add");} else{locationf("branch","Add");}
}

if (isset($_POST['edit_br'])) 
{  
 $id1 = $_POST['id'];
 $sql="UPDATE branch SET name='$_POST[bn]',cpp='$_POST[cpp]',editedby='$name' WHERE id=$id1";
 if(mysqli_query($connection,$sql)){locations("branch","Edit");} else{locationf("branch","Edit");}
}

if (isset($_POST['del_br'])) 
{ 
 $id1 = $_POST['del_id'];
 $sql="DELETE  FROM branch WHERE id=$id1 ";
 if(mysqli_query($connection,$sql)){locations("branch","Delete");} else{locationf("branch","Delete");}
}
?>