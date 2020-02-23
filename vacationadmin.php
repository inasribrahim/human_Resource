<!DOCTYPE html >
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
	<div class="brand">
    	 <figure>
    	 	<img src="../img/reunion.png" alt="logo" width="100px" height="100px" >
    		 <figcaption> Human Resource
    		</figcaption>
    	 <figure>
 	</div>
	<div class="container">
			<ul class="links" id="link"> 
		    <li class="btn active" ><a href="#" style="text-decoration: none;"> Admin </a></li>
			<li  class="btn"> <a href="#footer" style="text-decoration: none;"> about</a> </li>
			<li class="btn"> <a href="#" style="text-decoration: none;"> Signing Report</a> </li>
			<li class="btn"> <a href="veiwreport.php" style="text-decoration: none;">general report</a> </li>
			<li class="btn"> <a href="vacationadmin.php" style="text-decoration: none;" > Vacation</a> </li>
			<li class="btn"><a href="premissionadmin.php" style="text-decoration: none;"> permission</a> </li>
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
	</div>
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
			
			
		<?php 
			require '../session/session.php';
			$sql = "SELECT COUNT(noOfDays) as Days  ,userId,codeEmp,startDate,endDate,makeacomment,typeVacation FROM employeevacation GROUP BY codeEmp";
/*"`codeEmp`, `userId`, `noOfDays`, `startDate`, `endDate`, `totalDaysOfVacations`, `vacationStatus`, `makeacomment`, `typeVacation "*/			
			$result  =  mysqli_query($conn,$sql);
			
				echo "<table id=".'view-report'." cellpadding="."10px"." border-style ><tr><th>ID</th><th>Code</th><th>Start</th><th>End</th><th>No of Days</th><th>Comment</th><th>VacationType</th><th>Accept</th><th>Deny</th><th>pendding</th>";

			while($row = $result->fetch_assoc()) {
			echo "<tr><td>".$row["userId"]."</td><td>".$row["codeEmp"]."</td><td>".$row["startDate"]."</td><td>".$row["endDate"]."</td><td>".$row["Days"]."</td><td>".$row["makeacomment"]."</td><td>".$row["typeVacation"];
			?>
			<form  action="" method="POST">
			<td colspan="1"><input type="submit" name="accept" value="accept"></td>
			<td colspan="1"><input type="submit" name="deny" value="deny"></td>
			<td colspan="1"><input type="submit" name="pendding" value="pendding"></td>	
			</form>

			<?php
			"</td></tr>";}
			if(isset($_POST['accept'])){
				$sqlUpdate = "UPDATE  employeevacation SET vacationStatus = 'accept' WHERE vacationStatus ='pendding' ";
				    if ($conn->query($sqlUpdate) == true) { 
				    	echo 'Accepted All Request ';
						}
			}
			if(isset($_POST['deny'])){
				$sqlUpdate = "UPDATE  employeevacation SET vacationStatus = 'deny' WHERE vacationStatus ='pendding' ";
				   if ($conn->query($sqlUpdate) == true) { 
				    	echo 'Deny All Request ';
						}
			}
			if(isset($_POST['pendding'])){
				$sqlUpdate = "UPDATE  employeevacation SET vacationStatus = 'pendding' WHERE vacationStatus ='pendding' ";
				 if ($conn->query($sqlUpdate) == true) { 
				    	echo 'pendding All Request ';
						}
			}
		
			echo "</table>";
			echo"<br>";	
			$conn->close();
			?>
			</div>
					</section>

	<aside> 
		<button class="button" > <a href="addEmpolyee.php" style="text-decoration: none;"> ADD </a> </button> 
		<button class="button"> <a href="delete.php" style="text-decoration: none;"> Delete  </a> </button> 
		<button class="button"> <a href="update.php" style="text-decoration: none;"> Update  </a> </button>
		<button class="button"> <a href="search.php" style="text-decoration: none;"> Search  </a> </button> 
		<button class="button"> <a href="calculatesalary.php" style="text-decoration: none;"> Calculate Salary  </a> </button>
		<button class="button"> <a href="veiwreport.php" style="text-decoration: none;"> View Report </a> </button>
	</aside>
</dir>
	<footer id="footer">
	
		<section>
			<table border="0" cellpadding="15" >
				<caption align="left">About me</caption>
				<tr > 
				<th><img src="../img/facebook-logo.png" alt="A family of cats" width="26px" height="25px" /></th>
				<th><img src="../img/youtube-logo.png" alt="A family of cats" width="26px" height="25px" /></th>
				<th><img src="../img/rss.png" alt="A family of cats" width="26px" height="25px" /></th> 
				<th><img src="../img/twitter.png" alt="A family of cats" width="26px" height="25px" /></th>
			</tr>
		</table>
		<h4 align="right">&copy 2019 Thebes. A created by MIR7OKAKEMO </h4>
		</section>
	</footer>

	<!--  Start JavaScript -->
	<!--  End JavaScript -->
</body></html>