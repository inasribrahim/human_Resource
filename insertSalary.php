<?php
session_start() ;
	require '../session/db_connection.php';

	$hourInDay = (isset($_GET['HoursInDay']) ? $_GET['HoursInDay'] : null);
	$hoursInMonth = (isset($_GET['HoursInMonth']) ? $_GET['HoursInMonth'] : null);
	$incomeTax = (isset($_GET['incomeTax']) ? $_GET['incomeTax'] : null);
	$socialSecurity = (isset($_GET['socialSecurity']) ? $_GET['socialSecurity'] : null);
	$bounsInHours = (isset($_GET['bounsInHours']) ? $_GET['bounsInHours'] : null);
	$priceOfMission = (isset($_GET['priceOfMission']) ? $_GET['priceOfMission'] : null);
	$startDate = (isset($_GET['startDate']) ? $_GET['startDate'] : null);
	$endDate = (isset($_GET['endDate']) ? $_GET['endDate'] : null);
	$priceOfHoure = (isset($_GET['priceOfHoure']) ? $_GET['priceOfHoure'] : null);
	$regularLeave = (isset($_GET['regularLeave']) ? $_GET['regularLeave'] : null);
	$vacation = (isset($_GET['HoursInDay']) ? $_GET['vacation'] : null);
	$sqlId = "SELECT max(idSalary) as id From staticsalary ";
	$resultSearch = mysqli_query($conn,$sqlId);
    $row = mysqli_fetch_array($resultSearch,MYSQLI_ASSOC);
    $id = $row['id'];
    		$sql = " UPDATE staticsalary SET hoursInDay='$hourInDay',hoursInMonth='$hoursInMonth',incomeTax='$incomeTax' ,socialSecurity='$socialSecurity',bounsInHours='$bounsInHours',priceOfMission='$priceOfMission',startDate='$startDate',endDate='$endDate',priceOfHoure='$priceOfHoure',regularLeave='$regularLeave',vacation='$vacation' WHERE idSalary='$id'" ; 

	if(mysqli_query($conn, $sql)){
	    echo "Records added successfully.";
	} else{
	    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
	}
			$conn->close();


?>