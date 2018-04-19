<?php include("../../library/connect.php"); ?>

<?php if(!isset($_SESSION['tbl_users']['is_logged_in']) && $_SESSION['tbl_users']['is_logged_in'] != true ) header("Location:../login/loginfirst.php"); ?>



 <?php
    $pageName = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
 ?>
 

<body class="">
  <section class="vbox">
  <?php include('../../layout/footer.php') ?>

<section>
      <section class="hbox stretch">

<!-- .aside -->
        <aside class="bg-black aside-md hidden-print" id="nav">          
          <section class="vbox">
            <section class="w-f scrollable">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
                <div class="clearfix wrapper dk nav-user hidden-xs">
                  <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <span class="thumb avatar pull-left m-r">                        
                        <img src="../../assets/images/a0.png" class="dker" alt="...">
                        <i class="on md b-black"></i>
                      </span>
                      <span class="hidden-nav-xs clear">
                        <span class="block m-t-xs">
                          <strong class="font-bold text-lt"><?php echo $_SESSION['tbl_users']['fullname']; ?></strong> 
                          <b class="caret"></b>
                        </span>
                        <span class="text-muted text-xs block">Art Director</span>
                      </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">                      
                      <li>
                        <span class="arrow top hidden-nav-xs"></span>
                        <a href="#">Settings</a>
                      </li>
                      <li>
                        <a href="profile.html">Profile</a>
                      </li>
                      <li>
                        <a href="#">
                          <span class="badge bg-danger pull-right">3</span>
                          Notifications
                        </a>
                      </li>
                      <li>
                        <a href="docs.html">Help</a>
                      </li>
                      <li class="divider"></li>
                      <li>
                        <a href="modal.lockme.html" data-toggle="ajaxModal" >Logout</a>
                      </li>
                    </ul>
                  </div>
                </div>                


                <!-- nav -->                 
                <nav class="nav-primary hidden-xs">
                  <div class="text-muted text-sm hidden-nav-xs padder m-t-sm m-b-sm">Start</div>
                  
                  <ul class="nav nav-main" data-ride="collapse">
                    
                    
                    <li class="<?php echo (isset($active) && $active == 'members' ? 'active' : ''); ?>">
                      <a href="../members/members.php?p=view-member" class="auto">
                        <i class="i i-grid2 icon"></i>
                        <span class="font-bold">Members</span>
                      </a>
                    </li>
                  
                    <li class="<?php echo (isset($active) && $active == 'loan' ? 'active' : ''); ?>">
                      <a href="../loan/loan.php" class="auto">
                        <i class="i i-docs icon"></i>
                        <span class="font-bold">Loan</span>
                      </a>
                    </li>

                    <li class="<?php echo (isset($active) && $active == 'loan_payment' ? 'active' : ''); ?>">
                      <a href="../loan/loan_payment.php" class="auto">
                        <i class="i i-docs icon"></i>
                        <span class="font-bold">Loan Payment</span>
                      </a>
                    </li>

                    
                    

                  </ul>

                  <div class="line dk hidden-nav-xs"></div>
                  <div class="text-muted text-xs hidden-nav-xs padder m-t-sm m-b-sm">Lables</div>
                  <ul class="nav">
                    <li>
                      <a href="mail.html#work">
                        <i class="i i-circle-sm text-info-dk"></i>
                        <span>Work space</span>
                      </a>
                    </li>
                    <li>
                      <a href="mail.html#social">
                        <i class="i i-circle-sm text-success-dk"></i>
                        <span>Connection</span>
                      </a>
                    </li>
                    <li>
                      <a href="mail.html#projects">
                        <i class="i i-circle-sm text-danger-dk"></i>
                        <span>Projects</span>
                      </a>
                    </li>
                  </ul>
                  <div class="text-muted text-xs hidden-nav-xs padder m-t-sm m-b-sm">Circles</div>
                  <ul class="nav">
                    <li>
                      <a href="#">
                        <i class="i i-circle-sm-o text-success-lt"></i>
                        <span>College</span>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="i i-circle-sm-o text-warning"></i>
                        <span>Social</span>
                      </a>
                    </li>
                  </ul>
                </nav>
                <!-- / nav -->
              </div>
            </section>
            
           
              <?php include('../../layout/footer.php') ?>


          </section>
        </aside>

        <!-- /.aside -->

