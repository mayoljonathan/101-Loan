<?php include("library/connect.php"); ?>
<?php if(!isset($_SESSION['user']['is_logged_in']) && $_SESSION['user']['is_logged_in'] != true ) header("Location:views/login/login.php"); ?>
