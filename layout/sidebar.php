<?php include("../../library/connect.php"); ?>
<?php include("../../library/url_ini.php"); ?>
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
                        <span class="text-muted text-xs block" style="font-size: 13px"><center><?php echo $_SESSION['tbl_users']['user_type']; ?></center></span>
                      </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInDown m-t-xs">                      
                      <li>
                        <span class="arrow top hidden-nav-xs"></span>
                        
                      </li>
                      
                      <li>
                        <a href="../../layout/modal_lock.php" data-toggle="ajaxModal" >Logout</a>
                      </li>
                    </ul>
                  </div>
                </div>                


                <!-- nav -->                 
                <nav class="nav-primary hidden-xs">
                  <div class="text-muted text-sm hidden-nav-xs padder m-t-sm m-b-sm"></div>
                  
                  <ul class="nav nav-main" data-ride="collapse">
                    
               <!--  <li class="<?php echo (isset($active) && $active == 'dashboard' ? 'active' : ''); ?>">
                    <a href="../dashboard/dashboard.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li> -->

                   <?php 
                   $usertype = $_SESSION['tbl_users']['user_type'];
                    
                   if($usertype == 'Admin'){
                    
                        if($active == 'dashboard'){
                          echo '<li class="active">';
                        }else{
                          echo '<li>' ;
                        }
                          echo '<a href="../dashboard/dashboard.php" class="auto">
                                  <i class="i i-statistics icon">
                                  </i>
                                  <span class="font-bold">Dashboard</span>
                                </a>
                              </li>';
                    
                    }
                    
                    if($usertype == 'Admin' || 'Staff'){

                        if($active == 'members'){
                          echo '<li class="active">';
                        }else{
                          echo '<li>' ;
                        }
                          echo '<a href="../members/members.php?p=view-member" class="auto">
                                  <i class="fa fa-users"></i>
                                  <span class="font-bold">Members</span>
                                </a>
                              </li>';
                  
                        if($active == 'loan'){
                          echo '<li class="active">';
                        }else{
                          echo '<li>' ;
                        }
                          echo '<a href="../loan/loan.php" class="auto">
                                  <i class="fa fa-money"></i>
                                    <span class="font-bold">Loan</span>
                                  </a>
                                </li>';

                        if($active == 'loan_payment'){
                          echo '<li class="active">';
                        }else{
                          echo '<li>' ;
                        }
                          echo '<a href="../loan/loan_payment.php" class="auto">
                                  <i class="fa fa-dollar icon"></i>
                                    <span class="font-bold">Loan Payment</span>
                                  </a>
                                </li>';

                    } //Admin||STAFF ends

                    if($usertype == 'Admin'){

                        if($active == 'users'){
                          echo '<li class="active">';
                        }else{
                          echo '<li>' ;
                        }
                          echo '<a href="../users/users.php?p=view-users" class="auto">
                                  <i class="i i-users2 icon"></i>
                                    <span class="font-bold">Users</span>
                                  </a>
                                </li>';

                        if($active == 'comp_details'){
                          echo '<li class="active">';
                        }else{
                          echo '<li>' ;
                        }
                          echo '<a href="../comp_details/comp_details.php" class="auto">
                                  <i class="fa fa-renren"></i>
                                    <span class="font-bold">Company Details</span>
                                  </a>
                                </li>';

                        if($active == 'reports'){
                          echo '<li class="active">';
                        }else{
                          echo '<li>' ;
                        }
                          echo '<a href="../reports/reports.php" class="auto">
                                  <i class="fa fa-file-text-o icon"></i>
                                    <span class="font-bold">Reports</span>
                                  </a>
                                </li>';

                    }//END ADMIN

                    ?>

                  </ul>

                  
                </nav>
                <!-- / nav -->
              </div>
            </section>
            
           
              <?php include('../../layout/footer.php') ?>


          </section>
        </aside>

        <!-- /.aside -->

