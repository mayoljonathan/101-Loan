<?php include("../../library/connect.php"); 

$get_fullname = $_GET['name'];
$mid = $_GET['id'];



?>


<body class="modal-open">
<section class="vbox">

    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
            <!-- <p align="right"><a href="members.php?p=add-member">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                <p align="right"><a href="#modal-form1" class="btn btn-primary" data-toggle="modal">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <font size=4>Add New User &nbsp;<i class="fa fa-plus"></i></font></a></p>

			</div>

		    <div class="panel-body">

                <table class="table table-striped table-bordered table-hover">
            
            <?php
                if(isset($_GET['action']) && $_GET['action'] == "added") {
                    echo '<div class="alert alert-success fade in" align="center">';
                    echo '  <button type="button" class="close" data-dismiss="alert">×</button>';
                    echo "<i class='fa fa-ok-sign'></i><font size='3'>User ID : <strong>$mid <br> $get_fullname </strong> has been successfully added</font>" ;
                    echo '</div>';

                    
                }

                if(isset($_GET['action']) && $_GET['action'] == "updated") {
                  
                    echo '<div class="alert alert-success fade in" align="center">';
                    echo '  <button type="button" class="close" data-dismiss="alert">×</button>';
                    echo "<i class='fa fa-ok-sign'></i><font size='3'>User ID : <strong>$mid <br> $get_fullname </strong> has been successfully updated</font>" ;
                    echo '</div>';
                }

                if(isset($_GET['action']) && $_GET['action'] == "activate") {

                    $sql = $dbConn->query("SELECT * FROM tbl_users WHERE user_id = '".$mid."'");
                    while($row = $sql->fetch(PDO::FETCH_ASSOC)) { 
                        $get_fullname = $row['firstname'] . ' ' . $row['lastname'];
                                      
                    echo '<div class="alert alert-success fade in" align="center" >';
                    echo '  <button type="button" class="close" data-dismiss="alert">×</button>';
                    echo "<i class='fa fa-ok-sign'></i><font size='3'>User ID : <strong>$mid <br> $get_fullname </strong> has been set to <strong>ACTIVE</strong></font>" ;
                    echo '</div>';
                    }
                    
                }


                if(isset($_GET['action']) && $_GET['action'] == "deactivate") {

                    $sql = $dbConn->query("SELECT * FROM tbl_users WHERE user_id = '".$mid."'");
                    while($row = $sql->fetch(PDO::FETCH_ASSOC)) { 
                        $get_fullname = $row['firstname'] . ' ' . $row['lastname'];
                                      
                    echo '<div class="alert alert-success fade in" align="center" >';
                    echo '  <button type="button" class="close" data-dismiss="alert">×</button>';
                    echo "<i class='fa fa-ok-sign'></i><font size='3'>User ID : <strong>$mid <br> $get_fullname </strong> has been set to <strong><font color='red'>INACTIVE</strong></font></font>" ;
                    echo '</div>';
                    }
                    
                }

            ?>


					    <thead>
                             <tr>
                                <th><center>ID              </center></th>
                                <th><center>First Name    	</center></th>
                                <th><center>Last Name       </center></th>
                                <th><center>Username     	</center></th>
                                <th><center>Gender     	    </center></th>
                                <th><center>Email      	    </center></th>
                                <th><center>Contact  		</center></th>
                                <th><center>User Type       </center></th>
                                <th><center>Status 			</center></th>
                                <th><center>User Added      </center></th>
                                <th><center>Action          </center></th>
                            </tr>
                        </thead>
                            <tbody>
                                <?php

                                    $sql = $dbConn->query("SELECT * FROM tbl_users");
                                    while($row = $sql->fetch(PDO::FETCH_ASSOC)) { 
                                    $get_id          =$row['user_id'];
                                    $get_fname       =$row['firstname'];
                                    $get_lname       =$row['lastname'];
                                    $get_user        =$row['username']; 
                                    $get_gender      =$row['gender']; 
                                    $get_email       =$row['email'];   
                                    $get_contact     =$row['contact'];
                                    $get_usertype    =$row['usertype'];
                                    $get_status		 =$row['status']; 
                                    $get_user_added  =$row['user_added'];
                                    
                                    //----------------------------------------
                                    $get_pass		 =$row['password'];
                                    ?>
                                    
                                    <form method="post" action="userFunction.php">
                                        
                                    <tr class= "warning" >
                                        <td><center><?php echo $get_id; ?>          </center></td>
                                        <td><center><?php echo $get_fname; ?>       </center></td>
                                        <td><center><?php echo $get_lname; ?>       </center></td>
                                        <td><center><?php echo $get_user; ?>       </center></td>
                                        <td><center><?php echo $get_gender; ?>       </center></td>
                                        <td><center><?php echo $get_email; ?>     </center></td>
                                        <td><center><?php echo $get_contact; ?>     </center></td>
                                        <td><center><?php echo $get_usertype; ?> </center></td>
                                        <td><center><?php echo $get_status == 1 ? '<b><font color="#17b566">ACTIVE</font></b>' : '<b><font color="red">INACTIVE</font></b>' ?>      </center></td>
                                        <td><center><?php echo $get_user_added; ?> </center></td>

                                        <td><center>

                                            <input type='hidden' name="mid" value="<?php echo $get_id; ?>" > 

                                           <a href="userEditModal.php<?php echo $get_id; ?>" class="btn btn-info" role="button" data-target = "#userEditModal<?php echo $get_id;?>" data-toggle="modal" ><i class="fa fa-edit"></i></a>

                                            <?php 
                                                if($get_status == 0){
                                                    echo '<button class="btn btn-success" name="btn_activate"><i class="i i-checkmark2"></i>';
                                                }else{
                                                    echo '<button class="btn btn-danger" name="btn_deactivate"><i class="i i-cross2"></i>';
                                                }
                                            ?>

                                            </center>


                                            <!-- MEMBER EDIT MODAL -->
                                            <?php include ('userEditModal.php');?>
                                            <!-- END OF MEMBER EDIT MODAL -->


                                        </td>


                                	</tr>


                                    </form>
                                <?php        
                                    }

                                ?>
                            </tbody>
                    
                </table>


			</div>
	</div>
</div>

<!-- PREVENT ENTER -->
<script>
  
  $(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});

</script>


<!-- 1st page ADD MEMBER MODAL -->
<div class="modal fade" id="modal-form1">
    <div class="modal-dialog" style="width:45%;">
      <div class="modal-content">
        <div class="modal-body wrapper-lg">
          <div class="row">
            
            <h3 class="m-t-none m-b"><center>Adding a user</center></h3>

          
            <div class="page-header"></div>


            <div class="col-lg-12">

              <form method="POST" class="form-horizontal" data-validate="parsley" action="userFunction.php">

                <section class="panel panel-default">
                  <header class="panel-heading">
                    <strong>Personal Information</strong>
                  </header>
                  <div class="panel-body">  

                      
                        <div class="col-md-7">
                          <label><b>First Name</b></label>
                          <input type="text" name="txt_fname" class="form-control" placeholder="Enter first name">
                        </div>

                        
                        <div class="col-md-7">
                          <label><b>Last Name</b></label>
                          <input type="text" name="txt_lname" class="form-control" placeholder="Enter last name">
                        </div>

                        <div class="col-sm-5">
                          <label><b>Gender</b></label>
                            <div class="radio i-checks">
                              <label>
                                <input type="radio" name="radio_gender" value="Male">
                                <i></i>Male
                              </label>
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              <label>
                                <input type="radio" name="radio_gender" value="Female">
                                <i></i>Female
                              </label>

                            </div>
                        </div>

                       

                    </div>
                </section>
                      
        	</div>
                        
                  	<div class="col-lg-12">
                      
                        <section class="panel panel-default">
                            <header class="panel-heading">
                                <strong>Contact Details</strong>
                            </header>
                                <div class="panel-body">         

                                    <div class="col-md-6">
                                        <label><b>Mobile No.</b></label>
                                            <input type="text" name="txt_mobileno" class="form-control" placeholder="">
                                    </div>

                                    <div class="col-md-12">
                                        <label><b>Email</b></label>
                                            <input type="email" name="txt_email" class="form-control" placeholder="">
                                    </div>
                            
                                </div>
                          
                            
                          </section>
                      
                    </div>

                    <div class="col-lg-12">
                      
                        <section class="panel panel-default">
                            <header class="panel-heading">
                                <strong>User Information</strong>
                            </header>
                                <div class="panel-body">         

                                    <div class="col-md-12">
                                        <label><b>Username</b></label>
                                            <input type="text" name="txt_user" class="form-control" placeholder="">
                                    </div>

                                    <div class="col-md-12">
                                        <label><b>Password</b></label>
                                            <input type="password" name="txt_pass" class="form-control" placeholder="">
                                    </div>

                                    <div class="col-md-6">
                                        <label><b>User Type</b></label><br>
                                           <!-- <select style="width:260px" class="dropdown-label" required>

                                            <option value="Admin">Admin</option>
                                            <option value="Staff">Staff</option>

                                           </select> -->

                                           <button data-toggle="dropdown" class="btn btn-sm-10 btn-default dropdown-toggle">
				                            	<span class="dropdown-label">Select user type &nbsp;&nbsp;&nbsp;</span> 
				                            	<span class="caret"></span>
				                           </button>

				                           <ul class="dropdown-menu dropdown-select">
				                              <li><a href=""><input type="radio" name="radio_utype" value="Admin">Admin</a></li>
				                              <li><a href=""><input type="radio" name="radio_utype" value="Staff">Staff</a></li>
				                              
				                          </ul>
                                    </div>

                                    
                                </div>
                          
                            
                          </section>
                      
                    </div>

                        <p align="center"><button type="submit" name="btn_submitUser" class="btn btn-success btn-lg">Add user</button></p>
                  </form>
           
            
                </div>
          </div>          
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->




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
  <script src="../../assets/js/app.plugin.js"></script>

  <link rel="stylesheet" href="../../assets/js/datepicker/datepicker.css" type="text/css" />



</section>
</body>