<?php 
require '../session/session.php';
  if($_SESSION['login_user'] != "admin" ) {
     			 header("location:");
     } 
		$code= (isset($_POST['codeEmployee']) ? $_POST['codeEmployee'] : null);
		$username= (isset($_POST['user-name']) ? $_POST['user-name'] : null); 
		$premission= (isset($_POST['premission']) ? $_POST['premission'] : null);
		$profile= (isset($_POST['profileEmployee']) ? $_POST['profileEmployee'] : null);
		$fingerprint=(isset($_POST['fingerPrintEmployee']) ? $_POST['fingerPrintEmployee'] : null);
		$fristname=(isset($_POST['fristNameEmployee']) ? $_POST['fristNameEmployee'] : null);
		$lastname= (isset($_POST['lastNameEmployee']) ? $_POST['lastNameEmployee'] : null);
		$phone= (isset($_POST['phoneEmployee']) ? $_POST['phoneEmployee'] : null);
		$peremail=(isset($_POST['personalEmailEmployee']) ? $_POST['personalEmailEmployee'] : null);
		$organemail=(isset($_POST['organizationalEmailEmployee']) ? $_POST['organizationalEmailEmployee'] : null);
		$password=(isset($_POST['pass']) ? $_POST['pass'] : null);
		$faculty=(isset($_POST['facultydEmployee']) ? $_POST['facultydEmployee'] : null); 
		$department=(isset($_POST['departmentEmployee']) ? $_POST['departmentEmployee'] : null);
		$country=(isset($_POST['countryEmployee']) ? $_POST['countryEmployee'] : null);
		$nationality=(isset($_POST['nationalityEmployee']) ? $_POST['nationalityEmployee'] : null);
		$brithdate=(isset($_POST['brithdateEmployee']) ? $_POST['brithdateEmployee'] : null);
		$hiringdata=(isset($_POST['hiringdataEmployee']) ? $_POST['hiringdataEmployee'] : null);
		$rfcard=(isset($_POST['rfcardEmployee']) ? $_POST['rfcardEmployee'] : null);
		$grosssalary=(isset($_POST['grossSalaryEmployee']) ? $_POST['grossSalaryEmployee'] : null);
		$describejob=(isset($_POST['describeJobEmployee']) ? $_POST['describeJobEmployee'] : null);
		$address= (isset($_POST['addressEmployee']) ? $_POST['addressEmployee'] : null);
		$gender= (isset($_POST['gender']) ? $_POST['gender'] : null);



 $sqluser = "INSERT into Users (userType,userName,password) values ('Employee' ,'$username','$password' )"; 
$querySelectId =" SELECT max(userId) AS countId from Users  " ;
  $resultQuerySelectId = mysqli_query($conn,$querySelectId);
    $row = mysqli_fetch_array($resultQuerySelectId,MYSQLI_ASSOC);
    $id=$row['countId'] ;
$sqlEmployee = "insert into EmployeeInfo ( userId,codeEmp, fName ,lName ,faculty ,department ,title ,nationality, gender ,fingerPrint, facePrint ,rfCardNo , hringDate,  birthdate, mobile ,address ,grossSalary ) values ( 
  '$id',
  '$code',
  '$fristname',
  '$lastname',
  '$faculty',
  '$department',
  '$describejob',
  '$nationality',
  '$gender',
  '$fingerprint',
  '$profile',
  '$rfcard',
  '$hiringdata',
  '$brithdate',
  '$phone',
  '$address',
  '$grosssalary') " ;
$sqlEmail = "INSERT INTO Email (userId , codeEmp, personalEmail , organizationalEmail ) values ('$id' ,'$code' , 
'$peremail' , '$organemail') " ; 

	if(mysqli_query($conn, $sqlEmployee) &&  mysqli_query($conn, $sqlEmail) && mysqli_query($conn, $sqluser)){
	    header("location:addEmpolyee.php?Empty=Records added successfully.");
	} else{
	    header("location:addEmpolyee.php?Empty=ERROR: Could not able to execute. ".mysqli_error($conn));
	}
	$conn->close();
  ?>