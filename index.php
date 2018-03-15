<?php error_reporting(0); include"session.php";include "layout/header.php";?>
<?php include "connection/connection.php";?>

<?php


// $username=@$_REQUEST["loginname"];
// $id=@$_REQUEST["id"];
// $_SESSION["user"]=$username;
// $_SESSION["uid"]=$id;
if($_SESSION["username"]!='')
{
  header("Location:views/dashboard.php");
}
if(@$_REQUEST["loginstat"]=='fail')
  {
   ?> 
    <script>
     alert("login failed");
    </script>
  <?php 
  }
if(@$_REQUEST["pass"]=="success")
 {
  ?> 
    <script>
     alert("password successfully changed");
    </script>
  <?php 
  
}
 

  ?>
        


<div id="fullscreen_bg" class="fullscreen_bg"/>
<div id="regContainer" class="container">
    <div class="row">
      <div class="col-md-5 col-md-offset-3">
        <div class="panel panel-login">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-12">
                <a href="#" class="active" id="login-form-link">Login</a>
              </div>
            </div>
            <hr>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <form id="login-form"  action="controller/logcontrol.php" method="post" role="form" style="display: block;">
                  <div class="form-group">
                    <label for="username">Usermail</label>
                    <input type="text" name="Usermail" id="username" validation="texttype" tabindex="1" class="form-control" placeholder="Usermail" >
                    <span class="errorclass"></span>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="pass"  id="password"  tabindex="2" class="form-control" placeholder="Password">
                    <span class="errorclass"></span>
                  </div>
               
               
                 <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Login">
                      </div>
                    </div>
                  </div>
            
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<div id="particles-js"></div>

<?php include "layout/footer.php"?>
