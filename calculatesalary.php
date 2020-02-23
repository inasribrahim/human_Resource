<?php
   require ('../session/session.php');
    if($_SESSION['login_user'] != "admin" ) {
     			 header("location:");
     } 
?>
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
				<!-- Do event and show input code-->
				<form action = "insertSalary.php" method = "GET" >
	<h1>Salary Details </h1>
	<div id="csalaryl">
	<label > HoursInDay </label>
	<br>
	<input   onblur="validSalary(this ,'HoursInDay',' Hourse in Day')" type="text" name="HoursInDay" required  >
	</div>
	<div id="csalaryr">
		<label> HoursInMonth  </label>
		<br>
	<input onblur="validSalary(this ,'HoursInMonth',' Hourse in Month ')"  type="text" name="HoursInMonth"required>
	</div>
	<br>
		<div id="ctaxl">
	<label > Income tax  </label>
	<br>
	<input onblur="validSalary(this ,'incomeTax',' Income Tax  ')" type="text" name="incomeTax" required  >
	</div>
	<div id="ctaxr">
		<label> Social Security   </label>
		<br>
	<input onblur="validSalary(this ,'socialSecurity','Social Security')"  type="text" name = " socialSecurity" required>
	</div>
	<br>
			<label> Bouns In Hours  </label>
		<br>

	<input onblur="validSalary(this ,'bounsInHours',' Bouns In Hours')" type="text" name="bounsInHours" required>
	<label> Number of Prmissions </label>
		<br>
	<input  type="text" name="noOfPrmissions" required>
		<label> Price of Mission </label>
		<br>
	<input onblur="validSalary(this ,'priceOfMission',' Price of Mission')"  type="text" name="priceOfMission" required>
	<table>
	<tr><td><label> Start </label></td>
	<td><input type="time" required name="startDate"></td>
	<td>	<label> End </label></td>
	<td><input type="time" required  name="endDate" ></td></tr>
	</table>
		<label> Price of Houre </label>
		<br>
		<input onblur="validSalary(this ,'priceOfHoure',' Price of Houre')" type="text" name="priceOfHoure" required >

		<div id="cpremissionl">
		<label>  regular leave  </label>
		<br>
	<input type="number" max="21" min="1" name="regularLeave">
		</div>
	<div id="cpremissionr">
	<label> Agaza 3ardy </label>
		<br>
	<input type="number" max="3" min="1" name="vacation" >
	<br>
</div>
	<input type="submit" name="submit" value="CALACULATE" >
	</form>
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
	<footer>
	
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

	<!--  Start JavaScript -->
   <script type="text/javascript" src="../js/valid.js"></script>
	<!--  End JavaScript -->

</body>
</html>