<?php include "./dashhead.php";?>
<?php include "../connection/connection.php";?>
<?php include "./navigation/leftnavbar.php";?>
<?php include "./navigation/topnavbar.php";?>
<?php
if(@$_GET["stat"]=="success")
{?>
  <script type="text/javascript">
    alert("you have submitted todays report");
  </script>
<?php
} 
?>
<style type="text/css">
.report{
      background: #eee;
    padding: 20px;
    margin: 20px auto;
    text-align: center;
       }
.md-form .prefix~input, .md-form .prefix~textarea{width:90%};
</style>
<div class="content-wrapper">
<?php
date_default_timezone_set('Asia/Kolkata');
         $count=0;
         $currentdate=date('Y-m-d');
          $from=$currentdate.' 00:00:00';
          $to=$currentdate.' 23:59:59';
                  
         $sql = "select reportdate,reporttitle from report where userid=".$_SESSION['uid'] ." and reportdate between'".$from."'and'".$to."'";
           
         $test  = mysqli_query($link,$sql);
         $query = mysqli_fetch_array($test);
        $rptitle=$query['reporttitle'];
        $rpDate= date('Y-m-d', strtotime($query['reportdate']));
               
        
if($rpDate!=$currentdate && $rptitle=='')
{ $count++;
  
        if($count!=0)
           { 
                $currenttime=date('H') ;
                  if($currenttime>=9 && $currenttime<=18)
                   {
                   ?>
                   <div class="container">
                       <div class="row" style="width:100%">
                          <!-- Grid column -->
                          <form name="report" method="POST" action="../controller/control.php" style="width:100%">
                          <div class="col-md-12 mb-6">
                              <div class="card">
                                  <div class="card-body">
                                      <h3 class="text-center default-text py-3"><i class="fa fa-book"></i> Submit Report:</h3>
                                      <!--Body-->
                                      <div class="md-form">
                                          <i class="fa fa fa-book prefix grey-text"></i>
                                          <br><br>
                                          <div class="row">
                                          <div class="form-group">
                                          <select name="project" class="selectpicker  show-tick"  data-style="btn-info" required="" style="width:800px;margin-left:50px">
                                            <?php
                                            $user = "SELECT name ,projectid FROM projectinfo where userid=".$_SESSION['uid'];
                                              $checkQuery = mysqli_query($link, $user);
                                              $option = '';
                                              while($row = mysqli_fetch_array($checkQuery))
                                                {  
                                                 $option .='<option value="'.$row['projectid'].'">'.$row['name'].'</option>';
                                                 }
                                                echo $option;?>
                                         
                                            </select></div></div>
                                                
                                            
                                          

                                          <label for="defaultForm-email">Project Under Taken</label>
                                      </div>
                                      <div class="md-form">
                                          <i class="fa fa-pencil prefix grey-text"></i>
                                          <textarea type="text" required="" name="description" id="form81" class="md-textarea" style="height: 100px"></textarea>
                                          <label for="defaultForm-pass">Today Work Report</label>
                                      </div>
                                      <div class="text-center">
                                          <input type="submit" class="btn btn-default waves-effect waves-light" name="submitreport" value="submit">
                                      </div>
                                  </div>
                              </div>
                          </div>
                          </form>
                        </div>
                          <!-- Grid column -->
                          <!-- Grid column -->
                        
                          <!-- Grid column -->
                   </div>
                  <?php
                   }
               } 
  }              
else if($rpDate==$currentdate && $rptitle!="")
  {  ?> <div class="container">
                       <div class="row" style="width:100%">
                          <!-- Grid column -->
                          <form id="ff" name="report" method="POST" action="../controller/control.php" style="width:100%">
                          <div class="col-md-12 mb-6">
                              <div class="card">
                                  <div class="card-body">
                                      <h3 class="text-center default-text py-3"><i class="fa fa-book"></i> Submit Report:</h3>
                                      <!--Body-->
                                      <div class="md-form">
                                          <i class="fa fa fa-book prefix grey-text"></i>
                                          <br><br>
                                          <div class="row">
                                          <div class="form-group">
                                          <select name="project" class="selectpicker  show-tick"  data-style="btn-info" required="" style="width:800px;margin-left:50px">
                                            <?php
                                            $sql ="SELECT reporttitle from report where userid=".$_SESSION['uid']." AND reportdate between'".$from."'and'".$to."'";
                                             $query=mysqli_query($link,$sql);
                                              $rp=array();
                                              while($row1=mysqli_fetch_array($query))
                                              {
                                                $rp[]=$row1['reporttitle'];
                                              }
                                              $id=implode(" , " ,$rp);
                                                
                                            $user = "SELECT name ,projectid FROM projectinfo where userid=".$_SESSION['uid']." AND not projectid in (".$id.")";
                                              $checkQuery = mysqli_query($link, $user);
                                              $option ='';
                                              $counter=0;
                                              while($row = mysqli_fetch_array($checkQuery))
                                                                                       
                                                { 
                                                  
                                                  if($row['projectid']!=""&& ++$counter>0)
                                                     { 
                                                       $option .='<option value="'.$row['projectid'].'">'.$row['name'].'</option>';

                                                     } 
  

                                                 }
                                                echo $option;?>
                                         
                                            </select>

                                          </div></div>
                                                
                                            
                                          

                                          <label for="defaultForm-email">Project Under Taken</label>
                                      </div>
                                      <div class="md-form">
                                          <i class="fa fa-pencil prefix grey-text"></i>
                                          <textarea type="text" required="" name="description" id="form81" class="md-textarea" style="height: 100px"></textarea>
                                          <label for="defaultForm-pass">Today Work Report</label>
                                      </div>
                                      <div class="text-center">
                                          <input type="submit" class="btn btn-default waves-effect waves-light" name="submitreport" value="submit" />
                                      </div>
                                  </div>
                              </div>
                          </div>
                          </form>
                          <?php
                                            if($counter==0)
                                            {?>
                                              <script type="text/javascript">
                                                 $(function(){
                                                  $('#ff').remove();
                                                 })
                                              </script>
                                               
                                               <?php
                                              echo '<div class="report">All Reports are submitted for today</div>';
                                            }
                                            ?>

                          <!-- Grid column -->
                          <!-- Grid column -->
                        </div>
                        </div> 
                             <!-- Grid column -->
<?php           
}

// end of time checking
else
{
    echo '<div class="report">This section is accessible between 5 PM to 7 PM!  </div>';
}
?>
</div><!-- content wrapper close -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>
<?php include "dashfoot.php";?>

