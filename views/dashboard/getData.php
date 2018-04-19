
<?php
	$getData = $dbConn->query("SELECT * FROM tbl_loan");
	$loan_amount   = 0;
	$interest = 0;
	$total    = 0; 
	while($row = $getData->fetch(PDO::FETCH_ASSOC)) {
		$loan_amount   += $row['loan_amount'];
		$interest 	   += $row['interest'];
		$total         += $row['loan_amount'] + $row['interest'];
	}
?>
