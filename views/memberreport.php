<?php include "./dashhead.php";?>
<?php include "../connection/connection.php";?>
<?php include "./navigation/leftnavbar.php";?>
<?php include "./navigation/topnavbar.php";?>
<style type="text/css">
	/*.reportdata div{
		float: left;
		border:1px solid black;
	}*/
	.head th{
		text-align:center;
		width:170px;
		border:1px solid black;
	}
</style>
<?php
 echo $_SESSION['uid'];?>
 <div class="content-wrapper">
 <form action="./memberreport.php" method="post">
  <div class="form-row align-items-center">
    <div class="col-auto my-1">
      <label class="mr-sm-2" for="inlineFormCustomSelect">choose project</label>
      <select  name="select" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
        <?php
                                	$user = "SELECT * FROM project";
								    $checkQuery = mysqli_query($link, $user);
								    $option = '';
                                     while($row = mysqli_fetch_array($checkQuery))
                                      {
        	                           $option .= '<option value="'.$row['id'].'">'.$row['projectname'].'</option>';
        	                           }
        	                           echo $option;?>
      </select>
    </div>
   
    <div class="col-auto my-1">
      <button type="submit" name="member" value="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
<?php
if($_REQUEST['member']==submit)
{
	$id=$_POST['select']; 
	
  $sql="SELECT u.name,p.projectname,r.description,r.reportdate from report r INNER JOIN project p on r.reporttitle=p.id inner join user u on r.userid=u.id where p.id=".$id;
  
    $data='';
    $query=mysqli_query($link,$sql);
    while($row=mysqli_fetch_array($query))
{ 
	$data.='<tr class="table-success"><td class="name">'.$row['name'].'<td class="title">'.$row['projectname'].'</td><td class="des">'.$row['description'].'</td><td class="reportdate">'.$row['reportdate'].'</td></tr>';
	
      
}
}
 
?>

	<table class="heading table table-primary table-bordered table-hover ">
	   <thead class="thead-primary head">
	 <tr>
	   <th><h4>Member name</h4></th>
       <th><h4>Report Title</h4></th>
       <th><h4>Description</h4></th>
       <th><h4>Report Date</h4></th>
     </tr>
    </thead>
	<?php echo $data;?>
   </table>
</div>



<?php include "dashfoot.php";?>