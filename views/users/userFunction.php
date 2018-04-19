<?php include("../../library/connect.php"); ?>
<?php 

extract($_POST); 

	 // print_r($_POST);

	

	if (isset($btn_submitUser)) {

		$sql = $dbConn->query
		("INSERT INTO tbl_users(username,password,firstname,lastname,gender,email,contact,status,usertype)
	    VALUES('".$txt_user."', '".$txt_pass."', '".$txt_fname."', '".$txt_lname."', '".$radio_gender."', '".$txt_email."', '".$txt_mobileno."', '1', '".$radio_utype."') ");
		
		$fullname = $txt_fname.' '.$txt_lname ;

		if($sql) {


			$checkID = $dbConn->query
			("SELECT * from tbl_users WHERE firstname='".$txt_fname."' AND lastname='".$txt_lname."' ");
			while($row = $checkID->fetch(PDO::FETCH_ASSOC)) { 
				$get_id = $row['user_id'];

				header("Location:users.php?p=view-users&action=added&id=".$get_id."&name=".$fullname." ");

			}


			
		}

	}

	

	if(isset($btn_activate)){

		$id_get = $_POST['mid'];

		$sql = $dbConn->query("UPDATE tbl_users SET status='1' WHERE user_id = '".$id_get."'");
		if($sql) {
		
			header("Location:users.php?p=view-users&action=activate&id=$id_get ");

		}

	}

	if(isset($btn_deactivate)){

		$id_get = $_POST['mid'];

		$sql = $dbConn->query("UPDATE tbl_users SET status='0' WHERE user_id = '".$id_get."'");
		if($sql) {
		
			header("Location:users.php?p=view-users&action=deactivate&id=$id_get");

		}


	}


	if(isset($btn_editUser)){

		$sql = $dbConn->query
		("UPDATE tbl_users SET 
			username = '".$txt_user."',
			password = '".$txt_pass."',
			firstname = '".$txt_fname."',
			lastname = '".$txt_lname."',
			gender = '".$radio_gender."',
			email = '".$txt_email."',
			contact = '".$txt_mobileno."',
			usertype = '".$radio_utype."'
			WHERE user_id = '".$txt_id."' ");
	   
	   		$fullname = $txt_fname.' '.$txt_lname ;
		if($sql) {
		
			header("Location:users.php?p=view-users&action=updated&id=".$txt_id."&name=".$fullname." ");
		
		}

	}



?>