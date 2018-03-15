<?php date_default_timezone_set('Asia/Kolkata'); ?>
<script type="text/javascript">
  $(document).ready(function(){
       //alert("hi");
   var timestamp = '<?=time();?>';
   function updateTime(){
   $('#time').html(Date( timestamp).split('GMT')[0]);
   timestamp++;
  }
 $(function(){
 setInterval(updateTime, 1000);
});
});
</script>

 <body class="fixed-nav sticky-footer " id="page-top">
 <nav class="navbar navbar-expand-lg navbar-dark  fixed-top" id="mainNav" style="background-color: #00b9f5;border-bottom: 1px solid #eee;">

  <div class="collapse navbar-collapse" id="navbarResponsive">

 <div class="profile">
          <img src="../images/logo.png" class=" img-rounded" alt="">
        </div>
 
<ul class="navbar-nav ml-auto">
     
        <li class="nav-item">
                                  
              <span class="btn btn" id="time" style="background-color:#; min-height:5px; min-width:5px;">
              </span>
        </li>
        <li class="nav-item" style="background-color:#84b54c">
          <a class="nav-link"  href="../controller/logcontrol.php?pass=sess"
            <i class="fa fa-fw fa-sign-out" "></i>Logout</a>
        </li>
 </ul>
</div>
</nav>
