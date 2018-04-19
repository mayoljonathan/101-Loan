
<?php include("../../library/connect.php"); ?>
<?php if(isset($_SESSION['user']['is_logged_in']) && $_SESSION['user']['is_logged_in'] == true ) header("Location:../dashboard/dashboard.php"); ?>


<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>Scale | Sign In</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="../../assets/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="../../assets/css/animate.css" type="text/css" />
  <link rel="stylesheet" href="../../assets/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="../../assets/css/icon.css" type="text/css" />
  <link rel="stylesheet" href="../../assets/css/font.css" type="text/css" />
  <link rel="stylesheet" href="../../assets/css/app.css" type="text/css" />  
    <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
</head>

<body class="">
  <section id="content" class="m-t-lg wrapper-md animated fadeInUp">    
    <div class="container aside-xl">
      <img src="../../resources/images/loan_logo.png" class="m-r-sm" style="width:100%;height:100%" alt="scale">
      <section class="m-b-lg">
        <header class="wrapper text-center">
          <strong>Sign in to get in touch</strong>
        </header>

        <?php if(isset($_REQUEST['msg']) && $_REQUEST['msg'] == "error") { ?>
        <div class="alert alert-danger"><strong><center>Error :</strong> Username  / Password is Incorrect!</center></div>
        <?php  } else if(isset($_REQUEST['msg']) && $_REQUEST['msg'] == "lock") { ?>
        <div class="alert alert-danger"><strong><center>Error :</strong> Your account is temporary locked!</center></div>
        <?php } else if(isset($_REQUEST['msg']) && $_REQUEST['msg'] == "logout") { ?>
        <div class="alert alert-success"><strong><center>Sucessfully Log-out</center></strong></div>
        <?php } ?>

        <form method="post" action="checkLogin.php">
          <div class="list-group">
            <div class="list-group-item">
              <input type="text" placeholder="Username" style="text-align: center" name="username" class="form-control no-border" autocomplete="off" required autofocus="">
            </div>
            <div class="list-group-item">
               <input type="password" placeholder="Password" style="text-align: center"  name="password" class="form-control no-border" autocomplete="off" required>
            </div>
          </div>

          <button type="submit" class="btn btn-lg btn-primary btn-block" name="btn_login">Sign in</button>
         

        </form>


      </section>
    </div>
  </section>
  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder">
      <p>
        <small>Midterm Exam (Loan System)<br>&copy; Jonathan Mayol - 2016</small> <!-- Don't edit this pls-->
      </p>
    </div>
  </footer>
  <!-- / footer -->
  <script src="../../assets/js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../../assets/js/bootstrap.js"></script>
  <!-- App -->
  <script src="../../assets/js/app.js"></script>  
  <script src="../../assets/js/slimscroll/jquery.slimscroll.min.js"></script>
  <script src="../../assets/js/app.plugin.js"></script>


</body>
</html>