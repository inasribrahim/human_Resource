<?php   

   require '../session/session.php';

$user_id=$_SESSION['user_id'];
$sqlCode = "SELECT codeEmp from  EmployeeInfo where userId='$user_id'";
$resultSearch = mysqli_query($conn,$sqlCode);
$row = mysqli_fetch_array($resultSearch,MYSQLI_ASSOC);
$code = $row['codeEmp'];
/*Number of Days  */
$sqlIdSalary = "SELECT max(idSalary) as id From staticsalary ";
	$resultSalaryId = mysqli_query($conn,$sqlIdSalary);
    $row = mysqli_fetch_array($resultSalaryId,MYSQLI_ASSOC);
    $id = $row['id'];

$numberOfDays = "SELECT count(noOfDays) as noOfDays from  EmployeeVacation where  codeEmp='$code'";
$resultOfDays = mysqli_query($conn,$numberOfDays);
$rowDays = mysqli_fetch_array($resultOfDays,MYSQLI_ASSOC);
$Days=$rowDays['noOfDays'];
/*Number of Vacations */
$numberOfVacation = "SELECT regularLeave , vacation from  StaticSalary where idSalary='$id'";
$resultNumberOfDays = mysqli_query($conn,$numberOfVacation);
$rowNUmber = mysqli_fetch_array($resultNumberOfDays,MYSQLI_ASSOC);
$regularLeave=$rowNUmber['regularLeave'];
$vacation=$rowNUmber['vacation'];
$totalDays = $regularLeave + $vacation;
ECHO $totalDays ;
ECHO $Days ;
/*Check Days full off or not */
if($Days >  $totalDays) {
  	header("location:makevacation.php?Empty= Wronge to make a vacation  you get all vacations ");
  }
  else
  {
$vacation = (isset($_POST['Vacation']) ? $_POST['Vacation'] : null);
	$from = (isset($_POST['date-from']) ? $_POST['date-from'] : null);
	$to = (isset($_POST['date-to']) ? $_POST['date-to'] : null);
	$comment = (isset($_POST['comment']) ? $_POST['comment'] : null);
	$sql = " INSERT INTO `employeevacation`(`codeEmp`, `userId`, `noOfDays`, `startDate`, `endDate`, `totalDaysOfVacations`, `vacationStatus`, `typeVacation`, `makeacomment`) VALUES
	 ('$code','$user_id','$Days','$from' ,'$to', '$totalDays' ,'pendding','$vacation' , '$comment')";
if ($conn->query($sql) == true) { header("location:makevacation.php?Empty= Make Requst Successfuly"); }}
	$conn->close();
 ?>
