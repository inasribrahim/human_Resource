<?php   

   require '../session/session.php';

$user_id=$_SESSION['user_id'];
$sqlCode = "SELECT codeEmp from  EmployeeInfo where userId='$user_id'";
$resultSearch = mysqli_query($conn,$sqlCode);
$row = mysqli_fetch_array($resultSearch,MYSQLI_ASSOC);
$code = $row['codeEmp'];
$arrivalTime= (isset($_POST['arrivalTime']) ? $_POST['arrivalTime'] : null); 
$departureTime =  (isset($_POST['departureTime']) ? $_POST['departureTime'] : null); 
$sql = "INSERT INTO Time(codeEmp ,arrivalTime ,departureTime) Values ( '$code' ,'$arrivalTime' ,'$departureTime')";
if ($conn->query($sql) == true) { header("location:signingreport.php?Empty= Signing report Successfuly"); }
	$conn->close();
 ?>