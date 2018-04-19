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
                  <h1 class="page-header">&nbsp;&nbsp;Reports</h1>
              </div>


              <div class="panel-heading">   
                            <table class="table table-striped table-hover" id="tbl_reports">
                                <!-- <table class="table table-striped m-b-none" data-ride="datatables" id="tbl_loans"> -->
                                <thead>
                                    <tr>
                                        <th width="8%"><center>ID         </center></th>
                                        <th width="10%"><center>Transaction Date  </center></th>
                                        <th width="67%"><center>Content       </center></th>
                                        <th width="15%"><center>Operated By       </center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                      <?php

                                      $sql = $dbConn->query("SELECT * FROM tbl_reports");
                                      while($row = $sql->fetch(PDO::FETCH_ASSOC)) { 
                                      
                                      //----------------------------------------

                                      ?>
                                      
                                      <tr class= "warning" >  
                                        <td><center><?php echo $row['report_id']; ?>          </center></td>
                                        <td><center><?php echo $row['transactiondate']; ?>       </center></td>
                                        <td><center><?php echo "<font color='blue'>[".$row['loan_id']."]</font>"." ".$row['msg']; ?>       </center></td>   
                                        <td><center><?php echo $row['user']; ?>       </center></td>    
                                         
                                           

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

  $(document).ready(function() {


        $(document).ready(function() {
        $('#tbl_reports').dataTable( {
        "bProcessing": true,
        
          } );
        } );

 });


</script>

</body>

