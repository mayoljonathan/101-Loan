<?php include("../../library/connect.php");
	 session_destroy();
	//unset($_SESSION['tbl_users']['is_logged_in']);
	header("Location:../login/login.php?msg=logout");
?>