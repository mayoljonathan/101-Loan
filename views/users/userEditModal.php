

<div class="modal fade" id="userEditModal<?php echo $get_id; ?>">
    <div class="modal-dialog" style="width:45%;">
      <div class="modal-content">
        <div class="modal-body wrapper-lg">
          <div class="row">
            
            <h3 class="m-t-none m-b"><center>Editing a user</center></h3>

          
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
                          <input type="hidden" name="txt_id" value="<?php echo $get_id;?>">
                          <input type="text" name="txt_fname" class="form-control" value="<?php echo $get_fname;?>" placeholder="Enter first name">
                        </div>

                        
                        <div class="col-md-7">
                          <label><b>Last Name</b></label>
                          <input type="text" name="txt_lname" class="form-control" value="<?php echo $get_lname;?>" placeholder="Enter last name">
                        </div>

                        <div class="col-sm-5">
                          <label><b>Gender</b></label>
                            <div class="radio i-checks">
                              <label>
                                <?php 

                                  if ($get_gender == 'Male') {
                                    echo '<input type="radio" name="radio_gender" value="Male" checked="" >';
                                  }else{
                                    echo '<input type="radio" name="radio_gender" value="Male">';
                                  }

                                 ?>
                                
                                <i></i>Male
                              </label>
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              <label>
                                <?php 

                                  if($get_gender == 'Female'){
                                    echo '<input type="radio" name="radio_gender" value="Female" checked="" >';
                                  }else{
                                    echo '<input type="radio" name="radio_gender" value="Female">';
                                  }

                                 ?>

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
                                            <input type="text" name="txt_mobileno" class="form-control" placeholder="" value="<?php echo $get_contact;?> ">
                                    </div>

                                    <div class="col-md-12">
                                        <label><b>Email</b></label>
                                            <input type="email" name="txt_email" class="form-control" placeholder="" value="<?php echo $get_email;?> ">
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
                                            <input type="text" name="txt_user" value="<?php echo $get_user ?>" class="form-control" placeholder="">
                                    </div>

                                    <div class="col-md-12">
                                        <label><b>Password</b></label>
                                            <input type="password" name="txt_pass" value="<?php echo $get_pass ?>" class="form-control" placeholder="">
                                    </div>

                                    <div class="col-md-6">
                                        <label><b>User Type</b></label><br>
                                    
                                    <button data-toggle="dropdown" class="btn btn-sm-10 btn-default dropdown-toggle">
				                            	<span class="dropdown-label"><?php echo $get_usertype ?></span> 
				                            	<span class="caret"></span>
				                           </button>

				                            <ul class="dropdown-menu dropdown-select">

                                      <?php if($get_usertype == 'Admin'){

                                        echo '<li class="active"><a href=""><input type="radio" name="radio_utype" value="Admin" checked="">Admin</a></li>';
                                        echo '<li><a href=""><input type="radio" name="radio_utype" value="Staff" >Staff</a></li>';


                                      }else{

                                        echo '<li><a href=""><input type="radio" name="radio_utype" value="Admin" >Admin</a></li>';
                                        echo '<li class="active"><a href=""><input type="radio" name="radio_utype" value="Staff" checked="">Staff</a></li>';


                                      } 
                                     ?>
				                              
				                          </ul>
                                    </div>

                                    
                                </div>
                          
                            
                          </section>
                      
                    </div>

                    

                        <p align="center"><button type="submit" name="btn_editUser" class="btn btn-success btn-lg">Save Changes</button></p>
                  </form>
           
            
                </div>
          </div>          
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

