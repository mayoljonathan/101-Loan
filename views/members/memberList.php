<?php include("../../library/connect.php"); 

$get_fullname = $_GET['name'];
$mid = $_GET['id'];



?>


<body class="modal-open">
<section class="vbox">

<!-- <div class="display1"> -->


    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">

                <!-- <div class="col-sm-4">
                <input style="margin-top: 5px" type="text" class="form-control" placeholder="Search"></input>
                </div> -->

                
                <p align="right"><a href="#modal-form1" class="btn btn-primary" data-toggle="modal">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <font size=4>Add New Member &nbsp;<i class="fa fa-plus"></i></font></a></p>

                


        </div>
		    <div class="panel-body">

                <table class="table table-striped table-bordered table-hover">
            
            <?php
                if(isset($_GET['action']) && $_GET['action'] == "added") {
                    echo '<div class="alert alert-success fade in" align="center">';
                    echo '  <button type="button" class="close" data-dismiss="alert">×</button>';
                    echo "<i class='fa fa-ok-sign'><font size='3'></i>Member ID : <strong>$mid <br> $get_fullname </strong> has been successfully added</font>" ;
                    echo '</div>';

                    
                }

                if(isset($_GET['action']) && $_GET['action'] == "updated") {
                  
                    echo '<div class="alert alert-success fade in" align="center">';
                    echo '  <button type="button" class="close" data-dismiss="alert">×</button>';
                    echo "<i class='fa fa-ok-sign'></i><font size='3'>Member ID : <strong>$mid <br> $get_fullname </strong> has been successfully updated</font>" ;
                    echo '</div>';
                }

                if(isset($_GET['action']) && $_GET['action'] == "activate") {

                    $sql = $dbConn->query("SELECT * FROM tbl_members WHERE member_id = '".$mid."'");
                    while($row = $sql->fetch(PDO::FETCH_ASSOC)) { 
                        $get_fullname = $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'];
                                      
                    echo '<div class="alert alert-success fade in" align="center">';
                    echo '  <button type="button" class="close" data-dismiss="alert">×</button>';
                    echo "<i class='fa fa-ok-sign'></i><font size='3'>Member ID : <strong>$mid <br> $get_fullname </strong> has been set to <strong><font color='green'>ACTIVE</strong></font></font>" ;
                    echo '</div>';
                    }
                    
                }


                if(isset($_GET['action']) && $_GET['action'] == "deactivate") {

                    $sql = $dbConn->query("SELECT * FROM tbl_members WHERE member_id = '".$mid."'");
                    while($row = $sql->fetch(PDO::FETCH_ASSOC)) { 
                        $get_fullname = $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'];
                                      
                    echo '<div class="alert alert-success fade in" align="center" >';
                    echo '  <button type="button" class="close" data-dismiss="alert">×</button>';
                    echo "<i class='fa fa-ok-sign'></i><font size='3'>Member ID : <strong>$mid <br> $get_fullname </strong> has been set to <strong><font color='red'>INACTIVE</strong></font></font>" ;
                    echo '</div>';
                    }
                    
                }

            ?>


					    <thead>
                             <tr>
                                <th><center>ID          </center></th>
                                <th><center>First Name  </center></th>
                                <th><center>Middle Name  </center></th>
                                <th><center>Last Name   </center></th>
                                <th><center>Gender      </center></th>
                                <th><center>Mobile No. </center></th>
                                <th><center>Member Added</center></th>
                                <th><center>Status      </center></th>
                                <th><center>Action      </center></th>
                            </tr>
                        </thead>
                            <tbody>
                                <?php

                                    $sql = $dbConn->query("SELECT * FROM tbl_members");
                                    while($row = $sql->fetch(PDO::FETCH_ASSOC)) { 
                                    $get_id          =$row['member_id'];
                                    $get_fname       =$row['firstname'];
                                    $get_mname       =$row['middlename'];
                                    $get_lname       =$row['lastname']; 
                                    $get_gender      =$row['gender'];   
                                    $get_mobileno    =$row['mobileno'];
                                    $get_memberAdded =$row['member_added']; 
                                    $get_status      =$row['status'];
                                    
                                    //----------------------------------------
                                    $get_birthdate   =$row['birthdate'];   
                                    $get_address     =$row['address'];
                                    $get_education   =$row['education']; 
                                    $get_work        =$row['occupation'];
                                    $get_refname     =$row['refname'];   
                                    $get_refcontact  =$row['refcontact'];
                                    $get_homeno      =$row['homeno']; 
                                    $get_officeno    =$row['officeno'];
                                    $get_email       =$row['email'];
                                    $get_compname    =$row['compname']; 
                                    $get_compaddress =$row['compaddress'];
                                    $get_salary      =$row['salary'];   
                                    //----------------------------------------

                                    ?>
                                    
                                    <form method="post" action="memberFunction.php">
                                        
                                    <tr class= "warning" >
                                        <td><center><?php echo $get_id; ?>          </center></td>
                                        <td><center><?php echo $get_fname; ?>       </center></td>
                                        <td><center><?php echo $get_mname; ?>       </center></td>
                                        <td><center><?php echo $get_lname; ?>       </center></td>
                                        <td><center><?php echo $get_gender; ?>     </center></td>
                                        <td><center><?php echo $get_mobileno; ?>     </center></td>
                                        <td><center><?php echo $get_memberAdded; ?> </center></td>
                                        <td><center><?php echo $get_status == 1 ? '<b><font color="#17b566">ACTIVE</font></b>' : '<b><font color="red">INACTIVE</font></b>' ?>      </center></td>
                                        <td><center>

                                            <input type='hidden' name="mid" value="<?php echo $get_id; ?>" > 

                                            <a href="memberEditModal.php<?php echo $get_id; ?>" class="btn btn-info" role="button" data-target = "#memberEditModal<?php echo $get_id;?>" data-toggle="modal" ><i class="fa fa-edit"></i></a>

                                            <?php 
                                                if($get_status == 0){
                                                    echo '<button class="btn btn-success" name="btn_activate"><i class="i i-checkmark2"></i>';
                                                }else{
                                                    echo '<button class="btn btn-danger" name="btn_deactivate"><i class="i i-cross2"></i>';
                                                }
                                            ?>

                                            </center>


                                            <!-- MEMBER EDIT MODAL -->
                                            <?php include ('memberEditModal.php');?>
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
    <div class="modal-dialog" style="width:55%;">
      <div class="modal-content">
        <div class="modal-body wrapper-lg">
          <div class="row">
            
            <h3 class="m-t-none m-b"><center>Adding a member</center></h3>

          
            <div class="page-header"></div>


            <div class="col-lg-12">

              <form method="POST" class="form-horizontal" data-validate="parsley" action="memberFunction.php">

                <section class="panel panel-default">
                  <header class="panel-heading">
                    <strong>Personal Information</strong>
                  </header>
                  <div class="panel-body">  

                      
                        <div class="col-md-7">
                          <label><b>First Name</b></label>
                          <input type="text" name="txt_fname" class="form-control" placeholder="Enter first name">
                        </div>

                        <div class="col-sm-5">
                          <label><b>Middle Name</b></label>
                          <input type="text" name="txt_mname" class="form-control" placeholder="Enter middle name">
                        </div>

                        <div class="col-md-7">
                          <label><b>Last Name</b></label>
                          <input type="text" name="txt_lname" class="form-control" placeholder="Enter last name">
                        </div>

                        <!-- Date of Birth -->
                        <div class="col-md-7">
                          <label><b>Date of Birth</b></label>
                          <input class="input-md input-s datepicker-input form-control" name="txt_birthdate" size="16" type="text" required value="" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
                            <div class="datepicker dropdown-menu">
                                <div class="datepicker-days" style="display: block;">
                                    <table class=" table-condensed">
                                        <thead>
                                            <tr>
                                                <th class="prev">‹</th>
                                                <th colspan="5" class="switch">March 2013</th>
                                                <th class="next">›</th>
                                            </tr>

                                            <tr>
                                                <th class="dow">Su</th>
                                                <th class="dow">Mo</th>
                                                <th class="dow">Tu</th>
                                                <th class="dow">We</th>
                                                <th class="dow">Th</th>
                                                <th class="dow">Fr</th>
                                                <th class="dow">Sa</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td class="day  old">24</td>
                                                <td class="day  old">25</td>
                                                <td class="day  old">26</td>
                                                <td class="day  old">27</td>
                                                <td class="day  old">28</td>
                                                <td class="day ">1</td>
                                                <td class="day ">2</td>
                                            </tr>

                                            <tr>
                                                <td class="day ">3</td>
                                                <td class="day ">4</td>
                                                <td class="day ">5</td>
                                                <td class="day ">6</td>
                                                <td class="day ">7</td>
                                                <td class="day  active">8</td>
                                                <td class="day ">9</td>
                                            </tr>

                                            <tr>
                                                <td class="day ">10</td>
                                                <td class="day ">11</td>
                                                <td class="day ">12</td>
                                                <td class="day ">13</td>
                                                <td class="day ">14</td>
                                                <td class="day ">15</td>
                                                <td class="day ">16</td>
                                            </tr>
                                            
                                            <tr>
                                                <td class="day ">17</td>
                                                <td class="day ">18</td>
                                                <td class="day ">19</td>
                                                <td class="day ">20</td>
                                                <td class="day ">21</td>
                                                <td class="day ">22</td>
                                                <td class="day ">23</td>
                                            </tr>

                                            <tr>
                                                <td class="day ">24</td>
                                                <td class="day ">25</td>
                                                <td class="day ">26</td>
                                                <td class="day ">27</td>
                                                <td class="day ">28</td>
                                                <td class="day ">29</td>
                                                <td class="day ">30</td>
                                            </tr>

                                            <tr>
                                                <td class="day ">31</td>
                                                <td class="day  new">1</td>
                                                <td class="day  new">2</td>
                                                <td class="day  new">3</td>
                                                <td class="day  new">4</td>
                                                <td class="day  new">5</td>
                                                <td class="day  new">6</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>

                                <div class="datepicker-months" style="display: none;">
                                    <table class="table-condensed">
                                        <thead>
                                            <tr>
                                                <th class="prev">‹</th>
                                                <th colspan="5" class="switch">2013</th>
                                                <th class="next">›</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td colspan="7">
                                                    <span class="month">Jan</span>
                                                    <span class="month">Feb</span>
                                                    <span class="month active">Mar</span>
                                                    <span class="month">Apr</span>
                                                    <span class="month">May</span>
                                                    <span class="month">Jun</span>
                                                    <span class="month">Jul</span>
                                                    <span class="month">Aug</span>
                                                    <span class="month">Sep</span>
                                                    <span class="month">Oct</span>
                                                    <span class="month">Nov</span>
                                                    <span class="month">Dec</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="datepicker-years" style="display: none;">
                                    <table class="table-condensed">
                                        <thead>
                                            <tr>
                                                <th class="prev">‹</th>
                                                <th colspan="5" class="switch">2010-2019</th>
                                                <th class="next">›</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td colspan="7">
                                                    <span class="year old">2009</span>
                                                    <span class="year">2010</span>
                                                    <span class="year">2011</span>
                                                    <span class="year">2012</span>
                                                    <span class="year active">2013</span>
                                                    <span class="year">2014</span>
                                                    <span class="year">2015</span>
                                                    <span class="year">2016</span>
                                                    <span class="year">2017</span>
                                                    <span class="year">2018</span>
                                                    <span class="year">2019</span>
                                                    <span class="year old">2020</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

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

                        <div class="col-md-12">
                          <label><b>Address</b></label>
                          <input type="text" name="txt_address" class="form-control" placeholder="Enter address">
                        </div>

                        <div class="col-md-6">
                          <label><b>Highest Attainment of Education</b></label>
                          <input type="text" name="txt_education" class="form-control" placeholder="eg. high school,college,etc.">
                        </div>

                        <div class="col-md-6">
                          <label><b>Occupation</b></label>
                          <input type="text" name="txt_work" class="form-control" placeholder="Enter Occupation">
                        </div>

                        <div class="col-md-6">
                            <label><b>Reference Name</b></label>
                            <input type="text" name="txt_refname" class="form-control" placeholder="Reference Name(optional)">
                        </div>

                        <div class="col-md-6">
                            <label><b>Reference Contact No</b></label>
                            <input type="text" name="txt_refcontact" class="form-control" placeholder="Reference Contact No(optional)">
                        </div>



                        </div>
                        </section>
                      
                    </div>
                        <!-- <div class="col-lg-12">
                            <ul class="pager wizard m-b-sm">
                                <p align="right"><button class="btn btn-primary btn-lg" name="btn_next1">Submit</button></p>
                              </ul>
                        </div> -->
                    <!-- <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control" placeholder="Password">
                    </div> -->

                    <!-- <div class="checkbox m-t-lg">
                      <button type="submit" class="btn btn-sm btn-success pull-right text-uc m-t-n-xs"><strong>Log in</strong></button>
                      <label>
                        <input type="checkbox"> Remember me
                      </label>
                    </div>     
 -->

                   <div class="col-lg-12">
                      
                        <section class="panel panel-default">
                            <header class="panel-heading">
                                <strong>Contact Details</strong>
                            </header>
                                <div class="panel-body">         

                                    <div class="col-md-6">
                                        <label><b>Residential Telephone</b></label>
                                            <input type="text" name="txt_homeno" class="form-control" placeholder="">
                                    </div>

                                    <div class="col-md-6">
                                        <label><b>Office Telephone</b></label>
                                            <input type="text" name="txt_officeno" class="form-control" placeholder="">
                                    </div>

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
                                <strong>Employment</strong>
                            </header>
                                <div class="panel-body">         

                                    <div class="col-md-12">
                                        <label><b>Company Name</b></label>
                                            <input type="text" name="txt_compname" class="form-control" placeholder="">
                                    </div>

                                    <div class="col-md-12">
                                        <label><b>Company Address</b></label>
                                            <input type="text" name="txt_compaddress" class="form-control" placeholder="">
                                    </div>

                                    <div class="col-md-6">
                                        <label><b>Salary / Income</b></label>
                                            <input type="text" name="txt_income" class="form-control" placeholder="">
                                    </div>

                                    
                                </div>
                          
                            
                          </section>
                      
                    </div>

                    

                        <p align="center"><button type="submit" name="btn_submitMember" class="btn btn-success btn-lg">Add member</button></p>
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