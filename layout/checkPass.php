<?php include("../library/connect.php"); ?>

<?php
	extract($_POST);
// print_r($_POST);
      if(isset($btn_submit)){

        	$pass = $txt_pw;
        	$id = $txt_id;

          $sql = $dbConn->query("SELECT * FROM tbl_users WHERE user_id = '".$id."' AND password = '".$pass."' ");
          $row = $sql->fetch(PDO::FETCH_ASSOC);
          if($sql->rowCount() > 0 ) {
            
          	session_destroy();
    		    header("Location:../views/login/login.php?msg=logout");

          }else{

              if($_SESSION['tbl_users']['user_type'] == 'Admin'){
                header("Location:../views/dashboard/dashboard.php?msg=error");
              }else{
                header("Location:../views/members/members.php?p=view-member&msg=error");
              }
          }


      }

?>

