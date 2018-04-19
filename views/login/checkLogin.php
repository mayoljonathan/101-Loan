<?php include("../../library/connect.php"); ?>

<?php
	extract($_POST);

	if(isset($btn_login)) {
		$user = $username;
		$pass = $password;

		$sql = $dbConn->query("SELECT * FROM tbl_users	WHERE (username = '".$user."' OR  email = '".$user."' ) AND password = '".$pass."' ");
		$row = $sql->fetch(PDO::FETCH_ASSOC);
		if($sql->rowCount() > 0 ) {
			if($row['status'] == 1) {

				$_SESSION['tbl_users'] = array(
					'id_user' 		=> $row['user_id'],
					'fullname'		=> $row['firstname'] . ' ' . $row['lastname'],
					'user_type'		=> $row['usertype'],
					'is_logged_in'	=> true
					);

				if($_SESSION['tbl_users']['user_type'] == 'Admin'){
					header("location:../dashboard/dashboard.php");
				}else{
					header("location:../members/members.php?p=view-member");
				}


			} else {
				header("location:../login/login.php?msg=lock");
			}
		} else {
			header("location:../login/login.php?msg=error");
		}
	}

?>