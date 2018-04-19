<?php include("../../layout/header.php"); ?>
<?php include("../../layout/sidebar.php"); ?>

<section id="content">
          <section class="hbox stretch">
            <section>
              <section class="vbox">
                <section class="scrollable padder">              
                  


                	<!-- CONTENT HERE -->
                  <div id="page-wrapper">
    
			        <div class="col-lg-12">
			            <h1 class="page-header">&nbsp;&nbsp;List of Members</h1>
			        </div>

				        <?php
				            if(isset($_REQUEST['p']) && $_REQUEST['p'] == "add-member") {
				                 include("../members/memberAdd.php");
				            } else if(isset($_REQUEST['p']) && $_REQUEST['p'] == "view-member") {
				                include("../members/memberList.php");

				            }else if(isset($_REQUEST['p']) && $_REQUEST['p'] == "edit-member") {
				                include("../members/memberEdit.php");
				            
				            } else {
				                echo "ERROR";

				            }
				        ?>      
			           
					</div>


                  
              </section>
            </section>
    	</section>
    </section>

</section>