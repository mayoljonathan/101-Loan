 <?php
    $pageName = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
 ?>
 <?php
 	switch ($pageName) {
 		case 'dashboard.php':
 			$title  = "Dashboard | 101 Loan";
 			$active = "dashboard";
 			break;
 		case 'members.php':
 			$title  = "Members | 101 Loan ";
 			$active = "members"; 
 			break;
		case 'loan.php':
			$title  = "Loan | 101 Loan ";
			$active = "loan"; 
			break;
		case 'loan_payment.php':
			$title  = "Loan Payment | 101 Loan";
			$active = "loan_payment"; 
			break;
		case 'users.php':
			$title  = "Users 101 | Loan";
			$active = "users"; 
			break;
		case 'comp_details.php':
			$title  = "Company Details | 101 Loan";
			$active = "comp_details"; 
			break;
		case 'reports.php':
			$title  = "Reports | 101 Loan";
			$active = "reports"; 
			break;
		
 		


 		default:
 			# code...
 			break;
 	}
 ?>