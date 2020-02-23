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
    $rowSa = mysqli_fetch_array($resultSalaryId,MYSQLI_ASSOC);
    $id = $rowSa['id'];

$seleNuPre = "SELECT  noOfPremission From staticsalary where idSalary='$id' ";
	$resultNoPre = mysqli_query($conn,$seleNuPre);
    $rowNo = mysqli_fetch_array($resultNoPre,MYSQLI_ASSOC);
    $noPre = $rowNo['noOfPremission'];
    
    /*Insert into */
$permission = (isset($_POST['permission']) ? $_POST['permission'] : null);
	$from = (isset($_POST['from']) ? $_POST['from'] : null);
	$to = (isset($_POST['to']) ? $_POST['to'] : null);

   
$Condation = "SELECT count(currentCountOfPermissions) as current from employeepermission where codeEmp='$code' ";
$resultcond = mysqli_query($conn,$Condation);
    $rowcond = mysqli_fetch_array($resultcond,MYSQLI_ASSOC);
    $current = $rowcond['current'];


    if($current < $noPre) {
    $makePre = " INSERT INTO  employeepermission (codeEmp,
userId,reason,currentCountOfPermissions,totalCountsOfPermissions,permissionStatus,FROMPRE , TOPRE ) values ('$code' , '$user_id' , '$permission' ,'$current','$noPre','pendding','$from','$to') ";

if ($conn->query($makePre) == true) { header("location:makeapremission.php?Empty= Make Requst Successfuly"); }}
else
{
    header("location:makeapremission.php?Empty= You have exceeded the allowed prmissions");
}
	$conn->close(); 

    ?>