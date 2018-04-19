<?php 
 	error_reporting(0);
 	session_start(); 

	$dbHost = 'localhost';
	$dbUser = 'root';
	$dbPass = '';						
	$dbName = 'db_loansystem'; 
	$dbConn = null;

	try {

		$dbConn = new PDO("mysql:host={$dbHost};dbname={$dbName};", $dbUser, $dbPass);
	

	} catch (Exception $e) {

		echo json_encode(array("response" => "Failed"));
	}	
	

?>

<?php include("url_ini.php"); ?>