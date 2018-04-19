<?php include("../../library/connect.php"); ?>
<?php 

extract($_POST); 

	

	

	if (isset($btn_submitMember)) {

		$sql = $dbConn->query
		("INSERT INTO tbl_members(firstname,middlename,lastname,birthdate,gender,address,education,occupation,refname,refcontact,homeno,officeno,mobileno,email,compname,compaddress,salary,status)
	    VALUES('".$txt_fname."', '".$txt_mname."', '".$txt_lname."', '".$txt_birthdate."', '".$radio_gender."', '".$txt_address."', '".$txt_education."', '".$txt_work."', '".$txt_refname."', '".$txt_refcontact."', '".$txt_homeno."', '".$txt_officeno."', '".$txt_mobileno."', '".$txt_email."', '".$txt_compname."', '".$txt_compaddress."', '".$txt_income."', '1')");
		
		$fullname = $txt_fname.' '.$txt_mname.' '.$txt_lname ;
		
		if($sql) {


			$checkID = $dbConn->query
			("SELECT * from tbl_members WHERE firstname='".$txt_fname."' AND middlename='".$txt_mname."' AND lastname='".$txt_lname."' ");
			while($row = $checkID->fetch(PDO::FETCH_ASSOC)) { 
				$get_id = $row['member_id'];

				header("Location:members.php?p=view-member&action=added&id=".$get_id."&name=".$fullname." ");

			}


			
		}

	}

	

	if(isset($btn_activate)){

		$id_get = $_POST['mid'];

		$sql = $dbConn->query("UPDATE tbl_members SET status='1' WHERE member_id = '".$id_get."'");
		if($sql) {
		
			header("Location:members.php?p=view-member&action=activate&id=$id_get ");

		}

	}

	if(isset($btn_deactivate)){

		$id_get = $_POST['mid'];

		$sql = $dbConn->query("UPDATE tbl_members SET status='0' WHERE member_id = '".$id_get."'");
		if($sql) {
		
			header("Location:members.php?p=view-member&action=deactivate&id=$id_get");

		}


	}


	if(isset($btn_editMember)){

		$sql = $dbConn->query
		("UPDATE tbl_members SET 
			firstname = '".$txt_fname."',
			middlename = '".$txt_mname."',
			lastname = '".$txt_lname."',
			birthdate = '".$txt_birthdate."',
			gender = '".$radio_gender."',
			address = '".$txt_address."',
			education = '".$txt_education."',
			occupation = '".$txt_work."',
			refname = '".$txt_refname."',
			refcontact = '".$txt_refcontact."',
			homeno = '".$txt_homeno."',
			officeno = '".$txt_officeno."',
			mobileno = '".$txt_mobileno."',
			email = '".$txt_email."',
			compname = '".$txt_compname."',
			compaddress = '".$txt_compaddress."',
			salary = '".$txt_income."' WHERE member_id = '".$txt_id."' ");
	   
	   		$fullname = $txt_fname.' '.$txt_mname.' '.$txt_lname ;
		if($sql) {
		
			header("Location:members.php?p=view-member&action=updated&id=".$txt_id."&name=".$fullname." ");
		
		}

	}



?>