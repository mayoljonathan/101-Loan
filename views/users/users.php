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
			            <h1 class="page-header">&nbsp;&nbsp;List of Users</h1>
			        </div>

				        <?php
				            if(isset($_REQUEST['p']) && $_REQUEST['p'] == "add-users") {
				                 include("../users/usersAdd.php");
				            } else if(isset($_REQUEST['p']) && $_REQUEST['p'] == "view-users") {
				                include("../users/usersList.php");

				            }else if(isset($_REQUEST['p']) && $_REQUEST['p'] == "edit-users") {
				                include("../users/usersEdit.php");
				            
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