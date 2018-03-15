<?php include "../connection/connection.php";?>
<?php include "../session.php";?>
<?php
$email=$_SESSION["email"];
$empName= $_SESSION["username"];
if(@$_REQUEST["submitreport"]=="submit")
{  
    $title=$_REQUEST["project"];
    $desc=$_REQUEST["description"];   

  
   
   if($title==""||$desc=="")
   {
      header("Location:../views/dashboard.php?stat=empty");
   }
   else
   {
       function send_mail($ids,$subject,$mailBody)
	{
		$flag = 0;
		for($count=0;$count<count($ids);$count++)
		{
		   error_log($ids[$count]);
		   $to = $ids[$count];
		   $subject = $subject;
		   $header = "From: Website Query<contact@limitlessmobil.com> \r\n";
		   $header = "Cc:deependra@limitlessmobil.com \r\n";
		   $header .= "MIME-Version: 1.0\r\n";
		   $header .= "Content-type: text/html\r\n";
		   $message = $mailBody;
		   
		   $retval = mail ($to,$subject,$message,$header);
			
		   if( $retval == true )
			$flag = 1;
		   error_log(' sent : '.$flag);
		}
		return $flag;
	}
       
        $sql="INSERT INTO report(userid,reporttitle,description,reportdate,reporttype)VALUES('".$_SESSION['uid']."','$title','$desc','".date('Y-m-d H:i')."',1)";
        
        $query=mysqli_query($link,$sql);
        if($query==true)
        { 
          $message="";
          $header="";

            $ids = array('deependra@limitlessmobil.com','neha@limitlessmobil.com');
 		        $subject = "Daily Report of-".date("d-M-y");
 		        $mailBody = "<h4>Name : ".$empName."</h4>
 		             <h4>Project Under Taken: ".$title."</h4>
                     <h4> Daily Work Report : ".$desc."</h4>";
          
             $retval = send_mail($ids,$subject,$mailBody);
            // if( $retval == true )
            //  {
             
            //  header("Location:../views/dashboard.php?stat=true");
            //  exit;
            //  }
            // else 
            // {
            //   header("Location:../views/dashboard.php");
            //   exit;
            // }

             header("Location:../views/dashboard.php?stat=success");  exit;
        }
        else
        {
            header("Location:../views/dashboard.php?stat=fail");
          exit;
        }

   }
}

else if(@$_REQUEST["submitproject"]=="submit")

{    
   $sql1='INSERT into project(projectname) VALUES("'.$_POST['title'].'")';
    $query=mysqli_query($link,$sql1) OR die(mysql_error());
    $lastid=mysqli_insert_id($link);
    for($i=0;$i<sizeof($_POST["names"]);$i++)
     {  
      
    
     $sql='INSERT INTO projectinfo (projectid,name,userid) VALUES ('.$lastid.',"'. $_POST['title'] .'",'.$_POST["names"][$i].')';

        $query=mysqli_query($link,$sql) OR die(mysql_error());


         // echo "record added successfully";
        
           

     }
      header("Location:../views/addproject.php?stat=recorded");

 }
 
 

        



?>
  
