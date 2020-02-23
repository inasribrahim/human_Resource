<?php
   require '../session/session.php';
   $id=mysqli_real_escape_string($conn,$_SESSION['user_id']);
     $sql  = "SELECT  mobile , fName,lName , personalEmail , organizationalEmail, grossSalary , department ,title  FROM  EmployeeInfo , Email WHERE  EmployeeInfo.userId='$id' and Email.userId= '$id'"  ;
     $result = mysqli_query($conn,$sql);
     while ($row=mysqli_fetch_array($result))
    {
      $personal= $row['personalEmail']; 
      $organizational= $row['organizationalEmail']; 
       $fname = $row['fName'];
       $lname = $row['lName'];
       $mobile = $row['mobile'];
       $salary = $row['grossSalary'];
       $depart = $row['department'];
       $describe =$row['title'];
      }
      echo $row['fName'];
  // Free result set

   $id = mysqli_real_escape_string($conn,$_SESSION['user_id']);
   $queryCode =  "SELECT  codeEmp From EmployeeInfo where EmployeeInfo.userId ='$id'";
    $resultCode= mysqli_query($conn,$queryCode);
      while ($row=mysqli_fetch_array($resultCode))
    {
    	$code = $row['codeEmp'];
    }

/*Get maximum id */
$sqlIdSalary = "SELECT max(idSalary) as id From staticsalary ";
	$resultSalaryId = mysqli_query($conn,$sqlIdSalary);
    $rowSa = mysqli_fetch_array($resultSalaryId,MYSQLI_ASSOC);
    $id = $rowSa['id'];
    /*NUmber of vacation */
		$numberOfVacation = "SELECT regularLeave , vacation from  StaticSalary where idSalary='$id'";
$resultNumberOfDays = mysqli_query($conn,$numberOfVacation);
$rowNUmber = mysqli_fetch_array($resultNumberOfDays,MYSQLI_ASSOC);
$regularLeave=$rowNUmber['regularLeave'];
$vacation=$rowNUmber['vacation'];
$totalDays = $regularLeave + $vacation;
/*NUmber of vacations`s employee */
$numberOfDays = "SELECT count(noOfDays) as noOfDays from  EmployeeVacation where  codeEmp='$code'";
$resultOfDays = mysqli_query($conn,$numberOfDays);
$rowDays = mysqli_fetch_array($resultOfDays,MYSQLI_ASSOC);
$Days=$rowDays['noOfDays'];
/*number of primssiosns it is fixed number */
$seleNuPre = "SELECT  noOfPremission From staticsalary where idSalary= '$id'";
	$resultNoPre = mysqli_query($conn,$seleNuPre);
    $rowNo = mysqli_fetch_array($resultNoPre,MYSQLI_ASSOC);
    $noPre = $rowNo['noOfPremission'];
/*    number of current */
    $Condation = "SELECT permissionStatus , count(currentCountOfPermissions) as current from employeepermission where codeEmp='$code' ";
$resultcond = mysqli_query($conn,$Condation);
    $rowcond = mysqli_fetch_array($resultcond,MYSQLI_ASSOC);
    $current = $rowcond['current'];
     $status = $rowcond['permissionStatus'];

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
    	 	<img src="../img/reunion.png" alt="logo" width="100px" height="100px" itempro >
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
		<section >
			<div class="container-add">
				<form>
	<h1>Profile </h1>
	<label> Code  </label>
	<input type="text" placeholder="201620xx"  value="<?php echo  $code ?>" disabled >
		<br>
		<label> Name  </label>
		<br>
				<div id="ctextf">
		<input type="text" placeholder="Frist-Name" value="<?php echo $fname ?>" disabled >
	</div>
	<div id="ctextl">
		<input type="text" placeholder="Last-Name"  value="<?php echo  $lname ?>"  disabled>
	</div>
	<br>
	<label> Phone </label>
	<br>
	<div id="cphonel">
		<select class="number" disabled>
			<option value="egypt">+02</option>
			<option value="sudan">+249</option>
		</select>
</div>
	<div id="cphoner">
		<input type="text" placeholder="Mobile Number" value="<?php echo  $mobile ?>" disabled >
	</div>
	<br>
		<br>

		<label>Personal-Email </label>
		<input type="text" placeholder="ex@yahoo/gmail.com"  value="<?php echo  $personal ?>"  disabled>
		<br>

		<label>Organizational-Email</label>
		<input type="text" placeholder="ex@thebes.edu"  value="<?php echo  $organizational ?>"  disabled>
		<br>

 				<label>Salary</label>
		<input type="text"  value="<?php echo  $salary ?>" disabled>
			<br>

 				<label>Number of Days </label>
		<input type="text"  value="<?php echo $totalDays ; ?>" disabled>
			<br>

 				<label>Current of Days </label>
		<input type="text" value="<?php echo  $Days; ?>" disabled>
			<br>

 				<label>Number of Premissions </label>
		<input type="text"  value="<?php echo  $noPre; ?>" disabled>
			<br>

 				<label>Current of  Premissions </label>
		<input type="text"  value="<?php echo  $current ;?>" disabled>
			<br>

 				<label>Status of  Premissions </label>
		<input type="text"  value="<?php echo  $status ;?>" disabled>
			<br>
	</form>
</div>	
		</section>
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
		<h4 align="right">&copy 2019 Thebes. A created by MIR7OKAKEMO </h4>
		</section>
	</footer>


</body>
</html>