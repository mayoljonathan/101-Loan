
<div class="modal fade" id="memberEditModal<?php echo $get_id;?>" >
    <div class="modal-dialog" style="width:55%;">
      <div class="modal-content">
        <div class="modal-body wrapper-lg">
          <div class="row">
            
            <h3 class="m-t-none m-b"><center>Editing a member</center></h3>

            

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
                          <input type="hidden" name="txt_id" value="<?php echo $get_id;?>">
                          <input type="text" name="txt_fname" class="form-control" placeholder="Enter first name" value="<?php echo $get_fname ;?>">
                        </div>

                        <div class="col-sm-5">
                          <label><b>Middle Name</b></label>
                          <input type="text" name="txt_mname" class="form-control" placeholder="Enter middle name" value="<?php echo $get_mname ;?>">
                        </div>

                        <div class="col-md-7">
                          <label><b>Last Name</b></label>
                          <input type="text" name="txt_lname" class="form-control" placeholder="Enter last name" value="<?php echo $get_lname ;?>">
                        </div>

                        <!-- Date of Birth -->
                        <div class="col-md-7">
                          <label><b>Date of Birth</b></label>
                          <input class="input-md input-s datepicker-input form-control" name="txt_birthdate" size="16" type="text" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="<?php echo $get_birthdate ;?>" required>
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

                        <div class="col-md-12">
                          <label><b>Address</b></label>
                          <input type="text" name="txt_address" class="form-control" placeholder="Enter address" value="<?php echo $get_address;?>">
                        </div>

                        <div class="col-md-6">
                          <label><b>Highest Attainment of Education</b></label>
                          <input type="text" name="txt_education" class="form-control" placeholder="eg. high school,college,etc." value="<?php echo $get_education;?>">
                        </div>

                        <div class="col-md-6">
                          <label><b>Occupation</b></label>
                          <input type="text" name="txt_work" class="form-control" placeholder="Enter Occupation" value="<?php echo $get_work;?>">
                        </div>

                        <div class="col-md-6">
                            <label><b>Reference Name</b></label>
                            <input type="text" name="txt_refname" class="form-control" placeholder="Reference Name(optional)" value="<?php echo $get_refname;?>">
                        </div>

                        <div class="col-md-6">
                            <label><b>Reference Contact No</b></label>
                            <input type="text" name="txt_refcontact" class="form-control" placeholder="Reference Contact No(optional)" value="<?php echo $get_refcontact;?>">
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
                                            <input type="text" name="txt_homeno" class="form-control" placeholder="" value="<?php echo $get_homeno;?>">
                                    </div>

                                    <div class="col-md-6">
                                        <label><b>Office Telephone</b></label>
                                            <input type="text" name="txt_officeno" class="form-control" placeholder="" value="<?php echo $get_officeno;?>">
                                    </div>

                                    <div class="col-md-6">
                                        <label><b>Mobile No.</b></label>
                                            <input type="text" name="txt_mobileno" class="form-control" placeholder="" value="<?php echo $get_mobileno;?>">
                                    </div>

                                    <div class="col-md-12">
                                        <label><b>Email</b></label>
                                            <input type="email" name="txt_email" class="form-control" placeholder="" value="<?php echo $get_email;?>">
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
                                            <input type="text" name="txt_compname" class="form-control" placeholder="" value="<?php echo $get_compname;?>">
                                    </div>

                                    <div class="col-md-12">
                                        <label><b>Company Address</b></label>
                                            <input type="text" name="txt_compaddress" class="form-control" placeholder="" value="<?php echo $get_compaddress;?>">
                                    </div>

                                    <div class="col-md-6">
                                        <label><b>Salary / Income</b></label>
                                            <input type="text" name="txt_income" class="form-control" placeholder="" value="<?php echo $get_income;?>">
                                    </div>

                                    
                                </div>
                          
                            
                          </section>
                      
                    </div>
                        
                        <p align="center"><button type="submit" name="btn_editMember" class="btn btn-success btn-lg">Save Changes</button></p>
                  </form>
           
            
          </div>          
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
									  
									  
									  
 </div>
                