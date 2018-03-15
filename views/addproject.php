<?php include "./dashhead.php";?>
<?php include "../connection/connection.php";?>
<?php include "./navigation/leftnavbar.php";?>
<?php include "./navigation/topnavbar.php";?>
 <?php $type= $_SESSION["usertype"];
   if(@$_GET['stat']=="recorded")
   {?>
   <script type="text/javascript">
   	alert("project added successfully");
   </script>
  <?php }
  
  ?>
 
	<script>
		$(document).ready(function(){
		 	$('.js-example-basic-multiple').select2();

		 	
		});
	</script>
	<?php if($type==1)
	{

		?>

<div class="content-wrapper">
	 <form name="report" method="POST" action="../controller/control.php" style="width:100%">
                <div class="col-md-12 mb-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center default-text py-3"><i class="fa fa-book"></i> Add project</h3>
                            <!--Body-->
                            <div class="md-form">
                                <i class="fa fa fa-book prefix grey-text"></i>
                                <input type="text" placeholder="Project Name" name="title" id="title" class="form-control" required="">
                                <!-- <label for="defaultForm-email">Project Name</label> -->
                            </div>
                            <div class="md-form" >
                                <i class="fa fa-pencil prefix grey-text"></i><br><br>
                                <select class="js-example-basic-multiple" name="names[]" multiple="multiple"  style="width:928px;">
                                	<?php
                                	$user = "SELECT * FROM user";
								                  $checkQuery = mysqli_query($link, $user);
								                  $option = '';
                                     while($row = mysqli_fetch_array($checkQuery))
                                      {

                                      	
                                     // if($isSelected==$row['id']) echo $selected = 'selected';
        	                        $option .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
        	                           }
        	                           echo $option;?>
                               
                                  </select>
                                  <label for="defaultForm-email"> Add members</label>
                              </div>
                            
                            <div class="text-center" >
                                <input type="submit" class="btn btn-default waves-effect waves-light" name="submitproject" value="submit" />
                            </div>
                        </div>
                    </div>
                </div>
                </form>





</div>
<?php }
else {
	 echo '<div class="report" style="background: #eee;
    padding: 20px;
    margin: 20px auto;
    text-align: center;">Sorry, you can not access this page!!!  </div>';
}

?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<?php include "dashfoot.php";?>