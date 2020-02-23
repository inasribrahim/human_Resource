	<?php   
	require "../session/session.php";
	    $id=mysqli_real_escape_string($conn,$_SESSION['user_id']);

	        $sql  = "SELECT fName,lName ,codeEmp FROM  EmployeeInfo WHERE  EmployeeInfo.userId='$id'"  ;

      $result = mysqli_query($conn,$sql);
     while ($row=mysqli_fetch_array($result))
    {
       $fname = $row['fName'];
       $lname = $row['lName'];
       $code = $row['codeEmp'];

    }
	   $sqlUser  = "SELECT max(noOfDays) as lastvacation  from  employeevacation WHERE  employeevacation.userId='$id'"  ;
$resultUser = mysqli_query($conn,$sqlUser);
$rowId = mysqli_fetch_array($resultUser );
$maxId=$rowId['lastvacation'];

$sqlVacation= "SELECT  startDate ,endDate ,totalDaysOfVacations ,vacationStatus ,makeacomment,typeVacation  from  employeevacation WHERE  employeevacation.noOfDays='$maxId'" ;
$resultVacation = mysqli_query($conn,$sqlVacation);
    while ($rowVacation=mysqli_fetch_array($resultVacation))
    {
       $from=$rowVacation['startDate'];
       $to = $rowVacation['endDate'];
       $totalDaysOfVacations = $rowVacation['totalDaysOfVacations'];
       $status = $rowVacation['vacationStatus'];
       $comment = $rowVacation['makeacomment'];
       $type = $rowVacation['typeVacation'];
    }


$conn->close();
?>

	<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> HR admin </title>

<link rel="stylesheet" href="../css/TemplateCss.css">
</head>
<body>
<!-- Start Navigation Bar  -->
<header>
	<div class="navbar">
	<div class="brand" >
    	 <figure>
    	 	<img src="../img/reunion.png" alt="logo" width="100px" height="100px" >
    		 <figcaption> Human Resource
    		</figcaption>
    	 <figure>
 	</div>
	<div class="container">
		<ul class="links" id="link"> 
		<li class="btn active" ><a href="profileEmployeee.php" style="text-decoration: none;"> Profile </a></li>
			<li  class="btn"> <a href="#footer" style="text-decoration: none;"> about</a> </li>
			<li class="btn"> <a href="signingreport.php" style="text-decoration: none;"> Signing Report</a> </li>
			<li class="btn"> <a href="generalreportemployee.php" style="text-decoration: none;">general report</a> </li>
			<li class="btn"> <a href="makevacation.php" style="text-decoration: none;" > Vacation</a> </li>
			<li class="btn"><a href="makeapremission.php" style="text-decoration: none;"> permission</a> </li>
			<li class="btn" ><a href="../Login/logout.php" style="text-decoration: none;"> Logout </a> </li>
		</ul>
		<script>
		var header = document.getElementById("link");
		var btns = header.getElementsByClassName("btn");
		for (var i = 0; i < btns.length; i++) {
		  btns[i].addEventListener("click", function() {
		  var current = document.getElementsByClassName("active");
		  current[0].className = current[0].className.replace(" active", "");
		  this.className += " active";
		  });
		}
</script>
	</header>

	<article>
	</article>
	<!-- 
		Code, F-name, L-name, Faculty, Department, Title, Nationality, Gender, Finger-Print, Arrival-Time, Departure-Time, Face-Print, RF card No., Hiring-Date, Birthdate, Mobile, Address, and Personal-Email & organizational-Email.


	-->
	<div class="container-aside-and-content">
<article>
		<section>
			<div class="container-add">
			<table id="vacation-request" border="0" cellpadding="5px"  >
		<form>
	<tr>
		<tr><td><label>Code:</label></td>
		<td> <input type="text" name="code" value =" <?php echo $code; ?>" disabled></td></tr>
		<tr><td><label>Name:</label></td>
		<td> <input type="text" name="name" value =" <?php echo $fname . " ". $lname; ?>" disabled></td></tr>
		<tr><td><label>No.of Vacation:</label></td>
		<td> <input type="text" name="total vacation " value =" <?php echo $totalDaysOfVacations; ?>" disabled></td></tr>
		<tr><td><label>Total Days Vacation :</label></td>
		<td> <input type="text" name="total day "  value =" <?php echo $maxId; ?>"disabled></td></tr>
		<tr><td><label>From:</label></td>
		<td> <input type="text" name="From"  value =" <?php echo $from; ?>" disabled></td></tr>
		<tr><td><label>To:</label></td>
		<td> <input type="text" name="To" value =" <?php echo $to; ?>"  disabled></td></tr>
		<tr><td><label>Status:</label></td>
		<td> <input type="text" name="To" value =" <?php echo $status; ?>"  disabled></td></tr>
		<tr><td><label>Comment:</label></td>
		<td colspan="2"> <input type="text" value=" <?php echo $comment; ?>"  disabled></td></tr>
		<tr><td><label>Type of Vacation:</label> </td>
		<td colspan="2"> <input type="text" value=" <?php echo $type; ?>" disabled></td></tr>
	</form>
	</table>
</div>	
		</section>



	<aside> 

</div>


</dir>
	<footer id="footer">
	
		<section>
			<table border="0" cellpadding="15">
				<caption align="left">About me</caption>
				<tr> 
				<th><img src="../img/facebook-logo.png" alt="A family of cats" width="26px" height="25px" /></th>
				<th><img src="../img/youtube-logo.png" alt="A family of cats" width="26px" height="25px" /></th>
				<th><img src="../img/rss.png" alt="A family of cats" width="26px" height="25px" /></th> 
				<th><img src="../img/twitter.png" alt="A family of cats" width="26px" height="25px" /></th>
			</tr>
		</table>
		<h4 align="right" style="color:white !important;">&copy 2019 Thebes. A created by MIR7OKAKEMO </h4>
		</section>
	</footer>

	<!--  Start JavaScript -->
	<!--  End JavaScript -->

</body>
</html>