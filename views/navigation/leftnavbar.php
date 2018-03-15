<?php include "../../connection/connection.php";
      include " ../../session.php";?>
      <?php include "../dashhead.php";?>
      <?php echo $_SESSION["usertype"] ;?>

 <script type="text/javascript">
   var data='';
   var data1='';
   var data2='';
   var type;
   
   $(function()
   { var name='<?php echo $_SESSION["username"]?>';
      type=<?php echo $_SESSION["usertype"] ;?>;
      data += '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">\
        <a class="navbar-brand " href="./dashboard.php">welcome '+name+'\
       </a></li>\
   <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">\
     <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">\
          <i class="fa fa-fw fa-wrench"></i>\
          <span class="nav-link-text" style="color:black">Setting</span>\
        </a>\
        <ul class="sidenav-second-level collapse" id="collapseComponents">\
          <li>\
            <a href="./changepass.php">Change Password</a>\
          </li>\
        </ul>\
      </li>\
      <li>\
        <a class="nav-link" href="./viewreport.php">\
          <i class="fa fa-fw fa-area-chart"></i>\
          <span class="nav-link-text" style="color:black">Report</span>\
        </a>\
      </li>';
       
    data1+='<li id="project">\
          <a class="nav-link" href="./addproject.php">\
            <i class="fa fa-fw fa-area-chart"></i>\
            <span class="nav-link-text" style="color:black">project assigning</span>\
          </a>\
        </li>\
        <li id="project">\
          <a class="nav-link" href="./memberreport.php">\
            <i class="fa fa-fw fa-area-chart"></i>\
            <span class="nav-link-text" style="color:black">member reports</span>\
          </a>\
        </li>';
    data2=data.concat(data1);

   switch (type) 
   {
        case 1: 
        $('.side').html(data2);
        break;
        default:
        $('.side').html(data);
   }    


   });

 </script>  

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav side" id="exampleAccordion"
       style="background-color: #00b9f5;">
       <br>
      
        <!-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text" style="color:black">Setting</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="./changepass.php">Change Password</a>
            </li>
          </ul>
        </li>
        <li>
          <a class="nav-link" href="./viewreport.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text" style="color:black">Report</span>
          </a>
        </li>
        <li id="project" style="display:none">
          <a class="nav-link" href="./addproject.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text" style="color:black">project assigning</span>
          </a>
        </li> -->
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
         
  </nav>
  
   
    <!-- Bootstrap core JavaScript-->
    <script src="../asserts/vendor/jquery/jquery.min.js"></script>
    <script src="../asserts/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../asserts/vendor/jquery-easing/jquery.easing.min.js"></script>
    
    <script src="../asserts/js/sb-admin.min.js"></script>

   
    