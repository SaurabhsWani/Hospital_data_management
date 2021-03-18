<?php
include('security1.php');   
$role=$_POST['role'];
if ($_SERVER["REQUEST_METHOD"]=="POST") 
{
    if (empty($_POST["Email"])) 
    {
        echo '<script>alert(\"Please Enter Email\")</script>';
        echo '<script>window.location="login.php"</script>';    
    }
    elseif (!filter_var($_POST["Email"],FILTER_VALIDATE_EMAIL)) 
    {
        echo '<script>alert(\"Please Enter Valid Email\")</script>';
        echo '<script>window.location="login.php"</script>';    
    }
    else
    {
        if(isset($_POST['Email']))
        {
            $Email=$_POST['Email'];
            $query="SELECT password FROM $role WHERE email='$Email'";
            $result=mysqli_query($connection,$query);
            $passcode=mysqli_fetch_array($result);
            if($passcode['password']==$_POST['Password'])
            {

                if (isset($_POST['rm']))
                {
                    setcookie('email',$Email, time()+60*60*7);
                    setcookie('pass',$_POST['Password'], time()+60*60*7);
                }
                $sql="UPDATE $role SET status='on' WHERE email='$Email'";
                if(mysqli_query($connection,$sql))
                {
                    $query2="SELECT * FROM $role WHERE email='$Email' LIMIT 1";
                    $result=mysqli_query($connection,$query2);
                    $idd=mysqli_fetch_array($result);
                    $_SESSION['fn']=$idd['name'];
                    $_SESSION['id']=$idd['id'];
                    $_SESSION['role']=$role;
                    $_SESSION['email']=$idd['email'];
                    if($role != "admin")
                        {$_SESSION['br']=$idd['branch'];}
                    else
                    {
                        $_SESSION['br']="Dombivali";
                        $_SESSION['ea']=$idd['ea'];
                        $_SESSION['da']=$idd['da'];
                        $_SESSION['an']=$idd['an'];
                    }
                    echo '<script>window.location="main.php"</script>'; 
                }           
            }
            else
            {
                echo("<script>alert('Incorrect Password or Email');</script>");
                echo '<script>window.location="login.php"</script>';
                return false;
            }

        }
    }
}
?>