<?php   

   require '../session/session.php';

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
    		</a> <figcaption> Human Resource
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
				<form action="makedbvacation.php"  method="POST">
	<label> <strong> Type of Vacation </strong> </label> 
	<select name="Vacation">
		<option value="suddan" required >Suddon</option>
		<option value="usual" required> Usual  </option>
	</select>
	<br>
	<label> <strong> From </strong> </label>
		<input type="date" name="date-from" required >
	<br>
	<label> <strong> To </strong> </label>
		<input type="date" name="date-to" required >
	<br>
	<label> <strong> Make a comment * </strong></label>
	<textarea name="comment" size="100" required > Enter your reason to make a vacation </textarea>
	<br>
		<input type="submit" value="Make a Vacation"> </form>
		<br>
		<form action="statusvacation.php" method="GET">
		<input type="submit" value="Status Vacation" ></form>

			<?php if(@$_GET['Empty']==true)
	{
	?>
	<div class="alert" style="color:red;"><?php echo $_GET['Empty']; ?> </div>
	<?php
    }
	?>
			<?php if(@$_GET['Emptyvacation']==true)
	{
	?>
	<div class="alert" style="color:red;"><?php echo $_GET['Emptyvacation']; ?> </div>
	<?php
    }
	?>
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
		</table>
			</tr>
		</table>
		<h4 align="right">&copy 2019 Thebes. A created by MIR7OKAKEMO </h4>
		</section>
	</footer>

	<!--  Start JavaScript -->
	<script src="js/jquery.nicescroll.min.js"></script>
	<!--  End JavaScript -->

</body>
</html>