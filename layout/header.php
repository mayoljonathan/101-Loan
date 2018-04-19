<?php include("../../library/connect.php"); ?>
<?php include("../../library/url_ini.php") ?>
<?php if(!isset($_SESSION['tbl_users']['is_logged_in']) && $_SESSION['tbl_users']['is_logged_in'] != true ) header("Location:../login/loginfirst.php"); ?>


<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title><?php echo $title ?></title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="../../assets/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="../../assets/css/animate.css" type="text/css" />
  <link rel="stylesheet" href="../../assets/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="../../assets/css/icon.css" type="text/css" />
  <link rel="stylesheet" href="../../assets/css/font.css" type="text/css" />
  <link rel="stylesheet" href="../../assets/css/app.css" type="text/css" />  
  <link rel="stylesheet" href="../../assets/js/calendar/bootstrap_calendar.css" type="text/css" />
  <link rel="stylesheet" href="../../assets/js/datepicker/datepicker.css" type="text/css" />
  <link rel="stylesheet" href="../../assets/js/slider/slider.css" type="text/css" />
  <link rel="stylesheet" href="../../assets/js/chosen/chosen.css" type="text/css" />
  <link rel="stylesheet" href="../../assets/js/datatables/datatables.css" type="text/css"/>
  <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
</head>

<body>

<!-- HEADER -->
<header class="bg-white header header-md navbar navbar-fixed-top-xs box-shadow">
  <div class="navbar-header aside-md dk">
    <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav">
      <i class="fa fa-bars"></i>
    </a>
    <a href="../../views/dashboard/dashboard.php" class="navbar-brand">
      <img src="../../resources/images/loan_logo.png" class="m-r-sm" style="margin-left:50px;" alt="scale">
      <span class="hidden-nav-xs"></span>
    </a>
    <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">
      <i class="fa fa-cog"></i>
    </a>
  </div>
  

<!--  -->

 
  <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">
    

    <li class="dropdown">
      <a href="#">
        <div class="i i-calendar">

         <?php 
           date_default_timezone_set('Asia/Kuala_Lumpur');
           $date= date('Y-m-d') ;
           echo $date;
         ?> 
       </div>

      </a>
    </li>


    <li class="dropdown">
      <a href="#">
        
          <!-- TIME HERE -->
        
        <div class="i i-clock" id="timeNow"></div>

        
       
        <script>
            (function foo(){
                var d = new Date(<?php date_default_timezone_set('Asia/Kuala_Lumpur')?>);
                var hours = d.getHours();
                var minutes = d.getMinutes();
                var seconds = d.getSeconds();
                var period;
               
                // Convert the hours out of 24-hour time
                period = (hours >= 12 ? 'PM' : 'AM');
                hours = (hours > 12) ? hours - 12 : hours;
                hours = (hours == 0) ? 12 : hours;

                // Add the beginning zero to minutes and seconds if needed
                minutes = (minutes < 10 ? "0" : "") + minutes;
                seconds = (seconds < 10 ? "0" : "") + seconds;

                var clientTime =" "+(hours ? hours : 12) + ":"  + minutes + ":" + seconds + " " + period;

                document.getElementById("timeNow").innerHTML = clientTime;
                setTimeout(foo, 1000); // refresh time every 1 second


            })();
        </script>


       </a>
    </li>



    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <span class="thumb-sm avatar pull-left">
          <img src="../../assets/images/a0.png" alt="...">
        </span>
        <!-- PUT NAME HERE -->
        <?php echo $_SESSION['tbl_users']['fullname']; ?>
        <b class="caret"></b>
      </a>
      <ul class="dropdown-menu animated fadeInRight">            
        <li>
          <span class="arrow top hidden-nav-xs"></span>
          
        </li>
        
        <li>
          <a href="../../layout/modal_lock.php" data-toggle="ajaxModal" >Logout</a>
          <!-- <a href="../../views/logout/index.php">Logout</a> -->
        </li>
      </ul>
    </li>
  </ul>           
</header>


  <!-- SCRIPTS -->
  <script src="../../assets/js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../../assets/js/bootstrap.js"></script>
  <!-- App -->
  <script src="../../assets/js/app.js"></script>  
  <script src="../../assets/js/slimscroll/jquery.slimscroll.min.js"></script>
  <script src="../../assets/js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
  <script src="../../assets/js/charts/sparkline/jquery.sparkline.min.js"></script>
  <script src="../../assets/js/charts/flot/jquery.flot.min.js"></script>
  <script src="../../assets/js/charts/flot/jquery.flot.tooltip.min.js"></script>
  <script src="../../assets/js/charts/flot/jquery.flot.spline.js"></script>
  <script src="../../assets/js/charts/flot/jquery.flot.pie.min.js"></script>
  <script src="../../assets/js/charts/flot/jquery.flot.resize.js"></script>
  <script src="../../assets/js/charts/flot/jquery.flot.grow.js"></script>
  <script src="../../assets/js/charts/flot/demo.js"></script>

  <script src="../../assets/js/calendar/bootstrap_calendar.js"></script>
  <script src="../../assets/js/calendar/demo.js"></script>

  <script src="../../assets/js/sortable/jquery.sortable.js"></script>
  <script src="../../assets/js/app.plugin.js"></script>

  <!-- datepicker -->
  <script src="../../assets/js/datepicker/bootstrap-datepicker.js"></script>
  <!-- slider -->
  <script src="../../assets/js/slider/bootstrap-slider.js"></script>
  <!-- file input -->  
  <script src="../../assets/js/file-input/bootstrap-filestyle.min.js"></script>
  <!-- wysiwyg -->
  <script src="../../assets/js/wysiwyg/jquery.hotkeys.js"></script>
  <script src="../../assets/js/wysiwyg/bootstrap-wysiwyg.js"></script>
  <script src="../../assets/js/wysiwyg/demo.js"></script>
  <!-- markdown -->
  <script src="../../assets/js/markdown/epiceditor.min.js"></script>
  <script src="../../assets/js/markdown/demo.js"></script>

  <script src="../../assets/js/chosen/chosen.jquery.min.js"></script>
  

  
  <!-- datatables -->
  <script src="../../assets/js/datatables/jquery.dataTables.min.js"></script>
  <script src="../../assets/js/datatables/jquery.csv-0.71.min.js"></script>
  <script src="../../assets/js/datatables/demo.js"></script>
  
  <!-- new datatable -->
  <script src="../../assets/js/dataTables1/jquery.dataTables.js"></script>
  <script src="../../assets/js/dataTables1/dataTables.bootstrap.js"></script>

  </body>