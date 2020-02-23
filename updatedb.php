<?php 
require '../session/session.php';
  if($_SESSION['login_user'] != "admin" ) {
     			 header("location:");
     } 
   $code   = $_SESSION['codeforuser'];
		$fristname=(isset($_GET['fristNameEmployee']) ? $_GET['fristNameEmployee'] : null);
		$lastname= (isset($_GET['lastNameEmployee']) ? $_GET['lastNameEmployee'] : null);
		$phone= (isset($_GET['phoneEmployee']) ? $_GET['phoneEmployee'] : null);
		$peremail=(isset($_GET['personalEmailEmployee']) ? $_GET['personalEmailEmployee'] : null);
		$organemail=(isset($_GET['organizationalEmailEmployee']) ? $_GET['organizationalEmailEmployee'] : null);
		$password=(isset($_GET['passwordEmployee']) ? $_GET['passwordEmployee'] : null);	
		$grosssalary=(isset($_GET['salary']) ? $_GET['salary'] : null);

 $updateEmployee = "UPDATE  EmployeeInfo SET fName='$fristname' ,lName='$lastname' , mobile='$phone' , grossSalary='$grosssalary'  WHERE codeEmp='$code' "; 
  $resultUpdaeEmployee = mysqli_query($conn,$updateEmployee);
 $sqlSearch = "SELECT userId  FROM EmployeeInfo WHERE codeEmp='$code'";
 $resultSearch = mysqli_query($conn,$sqlSearch);
 $row = mysqli_fetch_array($resultSearch,MYSQLI_ASSOC);
 $id = $row['userId'];
 $updateUsers = "UPDATE  Users SET password='$password' WHERE userId ='$id'"; 
   $resultUpdateUser= mysqli_query($conn,$updateUsers);
 $updateEmail = "UPDATE  Email SET personalEmail='$peremail' , organizationalEmail='$organemail' WHERE Email.userId ='$id'"; 
  $resultUpdateEmail= mysqli_query($conn,$updateEmail);
  unset($_SESSION['codeforuser']);
    if ($conn->query($updateEmail) == true) { 

      header("location:update.php? EmptyUpdate= Updated Successfuly"); }
else
{
   header("location:update.php? EmptyUpdate= Updated Fail"); 
}

	$conn->close();
  ?>