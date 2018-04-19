<?php include("../library/connect.php"); ?>

<div class="modal-over">
  <div class="modal-center animated fadeInUp text-center" style="width:200px;margin:-80px 0 0 -100px;">
    <div class="thumb-md"><img src="../../resources/images/a0.png" class="img-circle b-a b-light b-3x"></div>
    <p class="text-white h4 m-t m-b">
    
    <?php 
      $fullname = $_SESSION['tbl_users']['fullname'];
      $id       = $_SESSION['tbl_users']['id_user'];

      echo $fullname;
    ?>
    <?php if(isset($_REQUEST['msg']) && $_REQUEST['msg'] == "error") { ?>
        <div class="alert alert-danger"><strong><center>Error :</strong> Username  / Password is Incorrect!</center></div>
    <?php } ?>
    
    </p>
    <div class="row">
        <form method="POST" action="../../layout/checkPass.php">


          <input type="hidden" name="txt_id" value ="<?php echo $id; ?>">
          <input type="password" name="txt_pw" class="form-control text-sm btn-rounded" placeholder="Enter pwd to Logout" autofocus="">
            
          <button class="btn btn-primary btn-rounded" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Cancel</button> 
          <button class="btn btn-primary btn-rounded" name="btn_submit" >Log Out <i class="i i-logout"></i></button>

          <!-- <a href="#" class="btn btn-success btn-rounded" name="btn_submit" type="button" data-dismiss="modal">Log Out <i class="fa fa-arrow-right"> </i></a>
           -->

        </form>


    </div>
  </div>
</div>