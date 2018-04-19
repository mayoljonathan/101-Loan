<?php include("../../layout/header.php"); ?>
<?php include("../../layout/sidebar.php"); ?>
<?php include("../../library/connect.php"); ?>


<body>

<section id="content">
  <section class="hbox stretch">
    <section>
      <section class="vbox">
        <section class="scrollable padder"> 

          <div id="page-wrapper">
    
              <div class="col-lg-12">
                  <h1 class="page-header">&nbsp;&nbsp;Loan Payment</h1>
              </div>


              <div class="panel-heading">   
                            <table class="table table-striped table-hover" id="tbl_loans">
                                <!-- <table class="table table-striped m-b-none" data-ride="datatables" id="tbl_loans"> -->
                                <thead>
                                    <tr>
                                        
                                        <th><center>Loan ID              </center></th>
                                        <th><center>MID                  </center></th>
                                        <th><center>Name                 </center></th>
                                        <th><center>Loan Amount          </center></th>
                                        <th><center>Interest Rate        </center></th>
                                        <th><center>Interest             </center></th>
                                        <th><center>Credit Term          </center></th>
                                        <th><center>Terms Left           </center></th>
                                        <th><center>Balance              </center></th>
                                        <th><center>Next Payment         </center></th>
                                        <th><center>Last Payment         </center></th>
                                        <th><center>Monthly Payment      </center></th>
                                        <th><center>Action               </center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $sql = $dbConn->query("SELECT * FROM tbl_loan l INNER JOIN tbl_members m ON l.member_id=m.member_id ") or die(mysql_error());
                                    while($row = $sql->fetch(PDO::FETCH_ASSOC)) { 

                                      // $join = $dbConn->query("SELECT `loan_id`,CONCAT(m.firstname' ',m.middlename,' ',m.lastname) as 'Fullname' , `loan_amount` ,`interest_rate` ,`interest` , `credit_term` , `first_payment`, `last_payment` , `monthly_payment` FROM tbl_loan l INNER JOIN tbl_members m ON l.member_id=m.member_id");

                                        ?>
                                        <tr class="warning">
                                            
                                            <td><center><?php echo $row['loan_id']; ?>                      </center></td> 
                                            <td><center><?php echo $row['member_id']; ?>                    </center></td> 
                                            <td><center><?php echo $row['firstname'] . ' ' . $row['middlename']  . ' ' . $row['lastname']; ?>                    </center></td> 
                                            <td><center><?php echo $row['loan_amount']; ?>                  </center></td> 
                                            <td><center><?php echo $row['interest_rate'].'%'; ?>            </center></td> 
                                            <td><center><?php echo $row['interest']; ?>                     </center></td> 
                                            <td><center><?php echo $row['credit_term'] ?>                   </center></td> 
                                            <td><center><?php echo $row['credit_termleft'] ?>               </center></td> 
                                            <td><center><?php echo $row['balance'] ?>                       </center></td> 
                                            <td><center><?php echo $row['first_payment'] ?>                 </center></td> 
                                            <td><center><?php echo $row['last_payment'] ?>                  </center></td> 
                                            <td><center><?php echo $row['monthly_payment'] ?>               </center></td> 
                                            <td><center>
                                                
                                                <form method="POST" action="loanFunction.php">
                                                  <input type="hidden" name="mid" value="<?php echo $row['member_id'] ?>"></input>
                                                  <?php 

                                                    if($row['credit_termleft'] == 0){
                                                      echo '<button class="btn btn-success" disabled="" name="btn_paid"> PAID </button>';
                                                    }else{
                                                      echo "<button class='btn btn-primary' name='btn_pay' value= ".$row['loan_id']." >Pay</button>";
                                                      // echo '<button type="button" class="btn btn-primary" tabindex="-1">Pay</button>
                                                      //        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>';
                            //             <ul class="dropdown-menu">
                            //   <li><a href="#">Pay Monthly</a></li>
                            //   <li><a href="#">Full Payment</a></li>
                            // </ul>


                                                    }

                                                   ?>
                                                  
                                                  </form>
                                                </center></td>

                                         
                                           

                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                      </div>



                </section>
            </section>
        </section>
    </section>

</section>
 

<script>
    // $(document).ready(function () {
    //     $('#tbl_loans').dataTable();
    // });


//     $(document).ready(function() {
//     $('#tbl_loans').dataTable( {
//     "bProcessing": true,
    
//   } );
// } );

  $(document).ready(function() {


   

        $(document).ready(function() {
        $('#tbl_loans').dataTable( {
        "bProcessing": true,
        
          } );
        } );

 });


//   $(document).ready(function(){
//     $('#tbl_loans').DataTable();
// });

</script>

</body>

