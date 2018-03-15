<?php include "./dashhead.php";?>
<?php include "../connection/connection.php";?>
<?php include "./navigation/leftnavbar.php";?>
<?php include "./navigation/topnavbar.php";?>
<style type="text/css">
	.reportdata div{
		float: left;
		border:1px solid black;
	}
	.heading div{
		text-align:center;
		float: left;
		width:320px;
		border:1px solid black;
	}
</style>
<?php
 echo $_SESSION['uid'];

$sql="SELECT  p.projectname,r.description,r.reportdate from report r INNER JOIN project p on  r.reporttitle=p.id where r.userid=".$_SESSION['uid'];
    $data='';
$query=mysqli_query($link,$sql);
while($row=mysqli_fetch_array($query))
{ 
	$data.='<tr class="table-success"><td class="title">'.$row['projectname'].'</td><td class="des">'.$row['description'].'</td><td class="reportdate">'.$row['reportdate'].'</td></tr>';
	
      
}

 
?>
<div class="content-wrapper">
	<table class="heading table table-primary table-bordered table-hover ">
		<thead class="thead-primary">
       <tr><th><h4>Report Title</h4></th>
       <th><h4>Description</h4></th>
       <th><h4>Report Date</h4></th>
     </tr></thead>
	<?php echo $data;?>
   </table>
	</div>
<?php include "dashfoot.php";?>