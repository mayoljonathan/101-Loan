<?php include("../../library/connect.php"); ?>
<?php 

extract($_POST); 

 // print_r($_POST);



	if(isset($btn_submitLoan)){

		$member_id		= $_POST['mid'];
		$loanAmount 	= $_POST['txt_loanAmount'];
		$interestRate 	= $_POST['txt_interestRate'];
		$creditTerm 	= $_POST['txt_creditTerm'];

		$interest 			= $_POST['txt_interest'];
		$firstPayment 		= $_POST['txt_fPayment'];
		$lastPayment 		= $_POST['txt_lPayment'];
		$monthlyPayment 	= $_POST['txt_mPayment'];

		$balance			= $_POST['txt_balance'];
		

		// Generate Random Letters/Numbers
			$d=date ("d");
			$m=date ("m");
			$y=date ("Y");
			$t=time();
			$dmt=$d+$m+$y+$t;    
			$ran= rand(0,10000000);
			$dmtran= $dmt+$ran;
			$un=  uniqid();
			$dmtun = $dmt.$un;
			$mdun = md5($dmtran.$un);
			$sort=substr($mdun, 22); // if you want sort length code.
		// ---------GET SORT --------------
			
			$sql = $dbConn->query
			("INSERT INTO tbl_loan (loan_id,member_id,loan_amount,interest_rate,interest,credit_term,credit_termleft,first_payment,last_payment,monthly_payment,balance) 
			VALUES('".$sort."','".$member_id."','".$loanAmount."','".$interestRate."','".$interest."','".$creditTerm."','".$creditTerm."','".$firstPayment."','".$lastPayment."','".$monthlyPayment."' ,'".$balance."') ");


			if($sql) {

				//CREATE DATE
				date_default_timezone_set('Asia/Kuala_Lumpur');
	            $date= date('Y-m-d') ;
	            //CREATE TIME
				$time= date("h:i:s A");
				
				$datetime = $date ." ".$time;

				//GETS MEMBERNAME
				$sql = $dbConn->query("SELECT * FROM tbl_members WHERE member_id = '".$member_id."' ") or die(mysql_error());
				while($row = $sql->fetch(PDO::FETCH_ASSOC)) { 
					$fullname = $row['firstname'] . ' ' . $row['middlename']  . ' ' . $row['lastname'];
				}


				// ADD REPORT
			    $msg = " Member : <font color=black><strong>".$fullname."</strong></font> applied for a loan of <font color=black><strong>₱".$loanAmount."</strong></font> with an interest rate of <font color=black><strong>".$interestRate."%</strong></font>.";
				$user = $_SESSION['tbl_users']['fullname'];

				$sql = $dbConn->query
				("INSERT INTO tbl_reports (transactiondate,loan_id,msg,user) 
				VALUES('".$datetime."', '".$sort."', '".$msg."', '".$user."') ");

				header("Location:loan.php?l=success&lid=".$sort." ");
			}

	}


	if(isset($btn_pay)){

		$loan_id = $_POST['btn_pay'];
		$member_id = $_POST['mid'];

		//CHECK THE CREDIT_TERMLEFT
		$checkCT = $dbConn->query
			("SELECT * from tbl_loan WHERE loan_id='".$loan_id."' ");
				while($row = $checkCT->fetch(PDO::FETCH_ASSOC)) { 
				
				//GETS THE CTL and DECREMENT 
					if($row['credit_termleft'] == 1){

						$getctl = $row['credit_termleft'];
						$getctl--;

						$getfp  = $row['first_payment'];

						$getmp	= $row['monthly_payment'];
						$getbal	= $row['balance'];

						$newbal = $getbal - $getmp;

						//DECREMENT CTL to 0 and Date dont increment
						$sql = $dbConn->query("UPDATE tbl_loan SET credit_termleft='".$getctl."',balance='0' WHERE loan_id = '".$loan_id."'");
						if($sql) {
						
							//GETS MEMBERNAME
							$sql = $dbConn->query("SELECT * FROM tbl_members WHERE member_id = '".$member_id."' ") or die(mysql_error());
							while($row = $sql->fetch(PDO::FETCH_ASSOC)) { 
								$fullname = $row['firstname'] . ' ' . $row['middlename']  . ' ' . $row['lastname'];
							}

							//CREATE DATE today
							date_default_timezone_set('Asia/Kuala_Lumpur');
				            $date= date('Y-m-d') ;
				            //CREATE TIME
							$time= date("h:i:s A");
							
							$datetime = $date ." ".$time;

							$user = $_SESSION['tbl_users']['fullname'];

							$msg = " Member : <font color=black><strong>".$fullname."</strong></font> paid a monthly payment of <font color=black><strong>₱".$getmp."</strong></font> for the <font color=black><strong>".$getfp."</font></strong>. <br>(Terms Left : ".$getctl." | Balance : ₱0) <br><font color=green><strong>FULLY PAID!</strong></font>";
				
							// echo $msg;
							//INSERT a RECORD IN THE REPORTS
							$sql = $dbConn->query
							("INSERT INTO tbl_reports (transactiondate,loan_id,msg,user) 
							VALUES('".$datetime."', '".$loan_id."', '".$msg."', '".$user."') ");

							header("Location:loan_payment.php?l=paidMonth");

						}

					}else{			//credit_termleft != 1

						$getctl = $row['credit_termleft'];
						$getctl--;

						$getfp  = $row['first_payment'];

						$getmp	= $row['monthly_payment'];
						$getbal	= $row['balance'];

						$newbal = $getbal - $getmp;

						//GETS THE DATE AND ADD 1 MONTH
						$date=date_create($getfp);
						date_add($date,date_interval_create_from_date_string("1 month"));
						$newdate = date_format($date,"Y-m-d");

						//DECREMENT the CTL by 1 and Date increments by 1
						$sql = $dbConn->query("UPDATE tbl_loan SET credit_termleft='".$getctl."', first_payment='".$newdate."',balance='".$newbal."' WHERE loan_id = '".$loan_id."'");
						if($sql) {
						


							//GETS MEMBERNAME
							$sql = $dbConn->query("SELECT * FROM tbl_members WHERE member_id = '".$member_id."' ") or die(mysql_error());
							while($row = $sql->fetch(PDO::FETCH_ASSOC)) { 
								$fullname = $row['firstname'] . ' ' . $row['middlename']  . ' ' . $row['lastname'];
							}

							//CREATE DATE today
							date_default_timezone_set('Asia/Kuala_Lumpur');
				            $date= date('Y-m-d') ;
				            //CREATE TIME
							$time= date("h:i:s A");
							
							$datetime = $date ." ".$time;

							$user = $_SESSION['tbl_users']['fullname'];

							$msg = " Member : <font color=black><strong>".$fullname."</strong></font> paid a monthly payment of <font color=black><strong>₱".$getmp."</strong></font> for the <font color=black><strong>".$getfp."</strong></font>. <br>(Terms Left : ".$getctl." | Balance : ₱".$newbal.")";
				
							// echo $msg;
							//INSERT a RECORD IN THE REPORTS
							$sql = $dbConn->query
							("INSERT INTO tbl_reports (transactiondate,loan_id,msg,user) 
							VALUES('".$datetime."', '".$loan_id."', '".$msg."', '".$user."') ");

							header("Location:loan_payment.php?l=paidMonth");

						}

					}

			}

	}	//end of $btn_pay




?>