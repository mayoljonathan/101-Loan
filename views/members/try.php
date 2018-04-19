<?php include("../../library/connect.php") ?>

<?php 

// $conn = mysqli_connect('localhost', 'root', '', 'db_loan');

// if(!$conn)
// {
//     echo 'Database Error: ' . mysqli_connect_error() ;
//     exit;
// }

// $results=array();
// $sql = "SELECT * FROM tbl_members WHERE firstname LIKE '".."'";
// $result = mysqli_query($conn,$sql);
// while ($row = mysqli_fetch_array($result))
// {
//     $results[] = $row['firstname'];
// }
// echo json_encode($results);


$sql = $dbConn->query("SELECT * FROM tbl_members WHERE firstname='Sam'");
while($row = $sql->fetch(PDO::FETCH_ASSOC)) { 

	$results[] = $row['lastname'];
}

	echo json_encode($results);
 ?>

