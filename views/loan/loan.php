<?php include("../../layout/header.php"); ?>
<?php include("../../layout/sidebar.php"); ?>
<?php include("../../library/connect.php"); ?>


<?php 

$lid = $_GET['lid'];

 ?>



<section id="content">
  <section class="hbox stretch">
    <section>
      <section class="vbox">
        <section class="scrollable padder"> 

<div class="col-sm-11">
    
        <div class="panel-heading">

             <!-- CONTENT HERE -->
                  <div id="page-wrapper">
                    <div class="">
                        <h1 class="page-header">&nbsp;&nbsp;Add Loan</h1>
                    </div>

                        <section class="panel panel-default">
                            
                                <div class="panel-body">         

                                    <?php
                                        if(isset($_GET['l']) && $_GET['l'] == "success") {
                                            echo '<div class="alert alert-success fade in" align="center">';
                                            echo '  <button type="button" class="close" data-dismiss="alert">×</button>';
                                            echo "<i class='fa fa-ok-sign'></i><font size='4'>Loan ID : <strong>$lid</strong> has been successfully added</font>" ;
                                            echo '</div>';

                    
                                            }

                                    ?>



                                    <form method="POST" action="loanFunction.php">

                                    <div class="line line-dashed b-b line-lg pull-in"></div>
                                        <div class="form-group">
                                          <label class="col-sm-2 control-label">Select a member :</label>
                                          <div class="col-sm-10">
                                            <select id="member_list" style="width:260px" class="chosen-select" onchange="getDetails()" required>
                                                <option></option>

                                                <optgroup label="Male">

                                                    <!-- MALE -->
                                                    <?php

                                                    $sql = $dbConn->query("SELECT * FROM tbl_members WHERE Gender='Male' AND Status='1' ORDER BY lastname ASC");
                                                    while($row = $sql->fetch(PDO::FETCH_ASSOC)) { 
                                                    $Mget_id          =$row['member_id'];
                                                    $Mget_fname       =$row['firstname'];
                                                    $Mget_mname       =$row['middlename'];
                                                    $Mget_lname       =$row['lastname']; 
                                                    $Mget_gender      =$row['gender'];   
                                                    
                                                    //----------------------------------------

                                                    $Mfullname = $Mget_lname . ', ' . $Mget_fname . ' ' . $Mget_mname;

                                                    ?>

                                                
                                                    <option id="<?php echo $Mget_id; ?>" value="" ><?php echo $Mfullname; ?></option>

                                                    <?php } ?>
                                                   
                                                </optgroup>

                                                <optgroup label="Female">

                                                    <!-- FEMALE -->
                                                    <?php

                                                    $sql = $dbConn->query("SELECT * FROM tbl_members WHERE Gender='Female' AND Status='1' ORDER BY lastname ASC");
                                                    while($row = $sql->fetch(PDO::FETCH_ASSOC)) { 
                                                    $Fget_id          =$row['member_id'];
                                                    $Fget_fname       =$row['firstname'];
                                                    $Fget_mname       =$row['middlename'];
                                                    $Fget_lname       =$row['lastname']; 
                                                    $Fget_gender      =$row['gender'];   
                                                    
                                                    //----------------------------------------

                                                    $Ffullname = $Fget_lname . ', ' . $Fget_fname . ' ' . $Fget_mname;

                                                    ?>

                                                    
                                                    <option id="<?php echo $Fget_id; ?>" value=""><?php echo $Ffullname; ?></option>

                                                    <?php } ?>
                                                    
                                                </optgroup>
                                                
                                            </select>
                                          </div>
                                        </div>
                                  
                                    
                                        <!-- GET Today's Date and Next month's DATE-->
                                    <?php 

                                        // $date=date_create();
                                        // date_add($date,date_interval_create_from_date_string("1 month"));
                                        // $today = date_format($date,"Y-m-d");
                                        
                                        
                                        // $next_month = strtotime(date("Y-m-d", strtotime($next_month)) . " +1 day");
                                        // $next_month = strtotime(date("Y-m-d", strtotime($next_month)) . " +1 week");
                                        // $next_month = strtotime(date("Y-m-d", strtotime($next_month)) . " +2 week");

                                        //GET
                                        // $next_month = date("Y-m-d"); 
                                        // $next_month = strtotime(date("Y-m-d", strtotime($next_month)) . " +1 month");
                                        // $next_month = date("Y-m-d",$next_month);
                                        //--------------

                                        // $next_month = strtotime(date("Y-m-d", strtotime($next_month)) . " +30 days");
                                        
                                        // date_default_timezone_set('Asia/Kuala_Lumpur');
                                        // $today = date("Y-m-d");
                                        // // $today = strtotime(date("Y-m-d", strtotime($today)) . " +1 month");
                                        // // $today = strtotime(date("Y-m-d", strtotime($today)) . " +1 day");
                                        // $today = strtotime(date("Y-m-d", strtotime($today)) . " +1 week");
                                        // $today = date("Y-m-d",$today);
                                        
                                        // echo $today;

                                    ?>

                                   
                                

                                    <input type="text" name="mid" id="mem_id" value=""></input>
                                    <div class="col-md-3">
                                        <label><b>Loan Amount</b></label>
                                            <input type="text" name="txt_loanAmount" id="loanAmount" class="form-control" placeholder="" required onkeyup="calculate()">
                                    </div>

                                    <div class="col-md-2">
                                        <label><b>Interest Rate(%)</b></label>
                                            <input type="number" name="txt_interestRate" id="interestRate" class="form-control" placeholder="" required onkeyup="calculate()" onchange="calculate()">
                                    </div>

                                    <div class="col-md-3">
                                        <label><b>Interest</b></label>
                                            <input type="text" name="txt_interest" id="interest" class="form-control" placeholder="" readonly="" required>
                                    </div>

                                    <div class="col-md-3">
                                        <label><b>Credit Term (months)</b></label>
                                            <input type="number" name="txt_creditTerm" id="creditTerm" class="form-control" placeholder="" required onkeyup="calculate()" style="width:60%;margin-left:10px;">
                                    </div>
                                    <div class="col-md-12"></div>
                                    <!-- SPACE -->

                                    <div class="col-md-3">
                                        <label><b>First Payment</b></label>
                                            <input type="text" name="txt_fPayment" id="fPayment" class="form-control" placeholder="yyyy-mm-dd" readonly="" required value="">
                                    </div>

                                    <div class="col-md-3">
                                        <label><b>Last Payment</b></label>
                                            <input type="text" name="txt_lPayment" id="lPayment" class="form-control" placeholder="yyyy-mm-dd" readonly="" required>
                                    </div>

                                    <div class="col-md-3">
                                        <label><b>Monthly Payment</b></label>
                                            <input type="text" name="txt_mPayment" id="monthlyPayment" class="form-control" placeholder="" readonly="" required>
                                            <input type="hidden" name="txt_balance" id="balance" class="form-control" placeholder="Balance">

                                    </div>



                                    <div class="row"></div>

                                    <div class="col-lg-2">
                                    <br>

                                          
                                    </div> 

                                    <div class="modal-footer">
                                        <!-- <a onclick="loanPressed()" name="btn_calculate" class="btn btn-s-md btn-primary" >Calculate</a> -->
                                        <button name="btn_submitLoan" class="btn btn-lg btn-success col-lg-10">Add Loan</button>
                                        
                                    </div>

                                     </form>
                                    

<script>
        
    $('#member_list').change(function(){
        var mid = ($(this).find('option:selected').attr('id'));
        document.getElementById("mem_id").value = mid;
    });

</script>


<script>
function calculate()
    {
          var la     = parseInt(document.getElementById('loanAmount').value);
          var ir     = parseInt(document.getElementById('interestRate').value);
          var ct     = parseInt(document.getElementById('creditTerm').value);
          
          var interestRate = ir/100;
          var interest     = la * interestRate;
          var monthly      = (la + interest)/ct;
          var bal          = la + interest;

          
          document.getElementById("interest").value       = interest;
          document.getElementById("monthlyPayment").value = monthly;

                
                //GET FIRST PAYMENT DATE
                //GET LAST PAYMENT DATE
                var lp = new Date();
                var dd = lp.getDate();
                var m = lp.getMonth()+2;        //next month
                var mm = lp.getMonth()+1+ct;    //next month+credit term
                var yy = lp.getFullYear();    //for fp
                var yyyy = lp.getFullYear();    //for lp

                while(mm>12){
                    mm=mm-12;
                    yyyy++;
                }


                // ADD 0 before the month
                if(dd<10) {
                    dd='0'+dd;
                } 

                if(mm<10) {
                    mm='0'+mm;
                } 

                if(m<10) {
                    m='0'+m;
                } 

                fp = yy+'-'+m+'-'+dd;
                lp = yyyy+'-'+mm+'-'+dd;

                document.getElementById("fPayment").value = fp ; 
                document.getElementById("lPayment").value = lp ; 

                document.getElementById("balance").value = bal ; 
    }
</script>

    

                                   
                           

                                </div>
                          

                          </section>
                    </div>
                </div>
            </div>
      
              </section>
            </section>
        </section>
    </section>

</section>

</body>

<!-- 
<script language="javascript" src="../../assets/js/jquery-1.2.6.min.js"></script>
<script language="javascript" src="../../assets/js/jquery.timer-1.0.0.js"></script> -->
<script language="javascript" src="../../assets/js/clock.js"></script>

<!-- <script language="javascript" src="../../assets/js/liveclock_lite.js"></script> -->



