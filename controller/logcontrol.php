<?php 
ob_start();
include "../session.php";
include "../connection/connection.php";
 ?>
 

<?php
$email= @$_REQUEST["Usermail"];
$pass= @$_REQUEST["pass"];
 //print_r($_REQUEST);
  
    if(@$_REQUEST["login-submit"]=="Login")
    {   
        
    	  if($email=='' && $pass=='')
    	  {
    	  	header("Location:../index.php?loginstat=fail");
    	  	exit;
    	  }
    	  else
    	  {
          
            $sql="select *from user where email='".$email."' AND password ='".$pass."'";
            $test    =mysqli_query($link,$sql);
            $query   = mysqli_num_rows($test);
            $row   =mysqli_fetch_array($test);
            //print_r( $row);
            $name=$row['name'];
            $email=$row['email'];
            $uid=$row['id'];
            $usertype=$row['usertype'];
             
          
    	 

            if($query==1)
            {  
                if($row['usertype']==0);
                $_SESSION["username"] = $name;
                $_SESSION["uid"] = $uid;
                $_SESSION["email"] = $email;
                $_SESSION["usertype"]=$usertype;
            	header("Location:../views/dashboard.php");
            	exit;
            }
            else{
            	header("Location:../index.php?loginstat=fail");
            	exit;
            }
    	 }
    }

    if(@$_REQUEST["pass"]=="sess")
    {
        session_unset(); 
        session_destroy(); 
        header("Location: ../");
        
        exit;
    }

    if(@$_REQUEST["change"]=="save")
    {  


        $id=$_SESSION["uid"];
        $sql="select * from user WHERE id='".$id."'";
        $query=mysqli_query($link,$sql);
        $result=mysqli_fetch_array($query);
        $pass2=$result['password'];
        
        $pass1=$_POST["pass"];
        $password=$_POST["pass1"];
        $password1=$_POST["password"];

        if($password==$password1 && $pass2==$pass1)
        {
        $sql="UPDATE user SET password='".$password."'WHERE id='".$id."'";
        // echo $sql;
        // exit;
        $query=mysqli_query($link,$sql);
        session_unset(); 
        session_destroy(); 
        header("Location:../");
        exit;
        }   
        else{
            header("Location:../views/dashboard.php?stat=fail");
        }
    }

  ?>