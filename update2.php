<?php 
require "../session/session.php"; 
 
    if(empty($_GET['codeEmployee'])){
    	header('location:search.php?Empty= Please write  the code  :( ');
    }
    else
    {
  	 $code= (isset($_GET['codeEmployee']) ? $_GET['codeEmployee'] : null);
 	$sqlSearch = "SELECT userId  FROM EmployeeInfo WHERE codeEmp='$code'";
      	  	$resultSearch = mysqli_query($conn,$sqlSearch);
    $row = mysqli_fetch_array($resultSearch,MYSQLI_ASSOC);
    $count = mysqli_num_rows($resultSearch);
    $id = $row['userId'];
     $sql  = "SELECT  mobile , fName,lName , personalEmail , organizationalEmail, grossSalary , department ,title , password  FROM  EmployeeInfo , Email ,Users WHERE  EmployeeInfo.userId='$id' and Email.userId= '$id'"  ;
      $result = mysqli_query($conn,$sql);
     while ($row=mysqli_fetch_array($result))
    {
    	$password = $row['password'];
      $personal= $row['personalEmail']; 
      $organizational= $row['organizationalEmail']; 
       $fname = $row['fName'];
       $lname = $row['lName'];
       $mobile = $row['mobile'];
       $salary = $row['grossSalary'];
       $depart = $row['department'];
       $describe =$row['title'];
      }
 }
 if ($fname == null )
 {
 	 header('location:update.php?Empty= User Not Found  :)');

 }
?>

<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title> Human reource  </title>

<link rel="stylesheet" href="../css/TemplateCss.css">
</head>
<body>
<!-- Start Navigation Bar  -->
<header>
	<div class="navbar">
	<div class="brand">
    	 <figure>
    	 	<img src="../img/reunion.png" alt="logo" width="100px" height="100px" >
    		</a> <figcaption> Human Resource
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

	
	<!-- 
		Code, F-name, L-name, Faculty, Department, Title, Nationality, Gender, Finger-Print, Arrival-Time, Departure-Time, Face-Print, RF card No., Hiring-Date, Birthdate, Mobile, Address, and Personal-Email & organizational-Email.

fristNameEmployee
lastNameEmployee
phoneEmployee
personalEmailEmployee
organizationalEmailEmployee
passwordEmployee
salary
	-->
	<div class="container-aside-and-content">
<article>

		<aside> 
			<button class="button" > <a href="addEmpolyee.php" style="text-decoration: none;"> ADD </a> </button> 
		<button class="button"> <a href="delete.php" style="text-decoration: none;"> Delete  </a> </button> 
		<button class="button"> <a href="update.php" style="text-decoration: none;"> Update  </a> </button>
		<button class="button"> <a href="search.php" style="text-decoration: none;"> Search  </a> </button> 
		<button class="button"> <a href="calculatesalary.php" style="text-decoration: none;"> Calculate Salary  </a> </button>
		<button class="button"> <a href="veiwreport.php" style="text-decoration: none;"> View Report </a> </button>
	</aside>
</div>


<article>
		<section>
			<div class="sec2">
				<form action="updatedb.php" method="GET">
	<label> Code  </label>
	<input type="text" placeholder="201620xx" disabled value="<?php echo  $code ?>" >
	<?php $_SESSION['codeforuser'] = $code ?>
		<br>
		<label> Name  </label>
		<br>
				<div id="ctextf">
		<input type="text" placeholder="Frist-Name" name="fristNameEmployee" value="<?php echo $fname ?>"   >
	</div>
	<div id="ctextl">
		<input type="text" placeholder="Last-Name" name="lastNameEmployee" value="<?php echo  $lname ?>"  >
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
		<input type="text" placeholder="Mobile Number" name="phoneEmployee" value="<?php echo  $mobile; ?>"  >
	</div>
	<br>
		<br>

		<label>Personal-Email </label>
		<input type="text" placeholder="ex@yahoo/gmail.com" name="personalEmailEmployee" value="<?php echo  $personal; ?>"  >
		<br>

		<label>Organizational-Email</label>
		<input type="text" placeholder="ex@thebes.edu" name="organizationalEmailEmployee" value="<?php echo  $organizational; ?>"  >
		<br>

		<label>Paswword</label>
		<input type="text" placeholder="password" name="passwordEmployee" value="<?php echo  $password; ?>"  >
		<br>

 				<label>Salary</label>
		<input type="text" name="salary" value="<?php echo  $salary ?>" >
		<br>
		<br>
				<input type="submit" value="Update" >

	</form>
</div>	
		<br>

</div>	
			</div>
		</section>

	</article>
	<footer id ="footer">
	
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
 </script>
	<!--  Start JavaScript -->
  <script type="text/javascript" src="../js/valid.js"></script>
	<!--  End JavaScript -->
<?php $conn->close(); ?>
</body>
</html>