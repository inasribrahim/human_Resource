<?php
   require '../session/session.php';
     if($_SESSION['login_user'] != "owner" ) {
     			 header("location:");
     } 

$user_name = $_SESSION['login_user'] ;
  $sqlCount  = "SELECT  count(*) as countEmploee  FROM  Users "  ;
     $result = mysqli_query($conn,$sqlCount);
     $row=mysqli_fetch_array($result);
    $counter=$row['countEmploee'];
    $sqlSum = "SELECT   SUM(grossSalary) as sum  ,  count(*) as count FROM  EmployeeInfo "  ;
     $resultSum = mysqli_query($conn,$sqlSum);
     $rowSum=mysqli_fetch_array($resultSum);
    $sumSalary=$rowSum['sum'];
     $sumCount=$rowSum['count'];

    $sqlReport = "SELECT   incomeTax , socialSecurity , priceOfHoure ,bounsInHours ,startDate,endDate,regularLeave,vacation  FROM  StaticSalary "  ;
    $resultReport = mysqli_query($conn,$sqlReport);
    $rowReport=mysqli_fetch_array($resultReport);
    $incomeTax=$rowReport['incomeTax'];
    $socialSecurity=$rowReport['socialSecurity'];
    $priceOfHoure=$rowReport['priceOfHoure'];
    $bounsInHours=$rowReport['bounsInHours'];
    $startDate=$rowReport['startDate'];
    $endDate=$rowReport['endDate'];
    $regularLeave=$rowReport['regularLeave'];
    $vacation=$rowReport['vacation'];
/*Calculate Taxes */
    $totalTaxes =  abs($sumSalary - ($sumCount *($incomeTax + $socialSecurity))) ; 

$conn->close();
?>

<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> HR <?php $user = $_SESSION['login_user'];
echo $user; ?> </title>
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
	<div class="container" >
		<ul class="links" id="link"> 
			<li class="btn active" ><a href="#" style="text-decoration: none;"> <?php echo $user_name;?> </a></li>
			<li  class="btn"> <a href="#footer" style="text-decoration: none;"> about</a> </li>
			<li class="btn"> <a href="#" style="text-decoration: none;"> Sg Report</a> </li>
			<li class="btn"> <a href="#" style="text-decoration: none;">gl report</a> </li>
			<li class="btn"> <a href="#" style="text-decoration: none;" > Vacation</a> </li>
			<li class="btn"><a href="#" style="text-decoration: none;"> permission</a> </li>
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

regularLeave
vacation
startDate
endDate
priceOfHoure
priceOfMission
	-->
	<div class="container-aside-and-content">
<article>
		<section>
			<div class="container-add">
			<div class="gird-container ">
			<div class="item">Total Salary <br>  <?php  echo $sumSalary.'$'; ?> </div>
			<div class="item">No. of Employee  <br> <?php  echo $counter; ?></div>
			<div class="item">Open Company  <?php  echo $startDate; ?> </div>
			<div class="item">Close Company <?php  echo $endDate; ?> </div>
			<div class="item">Total Taxes <?php  echo $totalTaxes.'$'; ?> </div>
			<div class="item">No. of Vacation 3ardy <?php  echo $regularLeave; ?> </div>
			<div class="item">No. of Vacation 3adyaty <?php  echo $vacation; ?>  </div>
			<div class="item">Salary in Hours <?php  echo $priceOfHoure.'$'; ?> </div>
			<div class="item">Bouns in hours  <?php  echo $bounsInHours.'$'; ?> </div>
			
			</div>	

			<form action="../admin/search2.php" method="GET" >
	<h1>Search Employee</h1>
		<div id="csearchl">
	<label> Code  </label> 
	<br>
	<input  onblur="validInput(this ,'code','Code Number')" type="search" name = "codeEmployee" required>
	</div>
<br><br>
	<br>
	<input type="submit"  name="enter" value="Search" >
	</form>
	<?php if(@$_GET['Empty']==true)
	{
	?>
	<div class="alert" style="color:red;"><?php echo $_GET['Empty']; ?> </div>
	<?php
    }
	?>
		</section>



	<aside style="color:black; text-align: center;" > 
		 <img src="../img/graph.png" alt="Statsics" width="300" height="300 " style="border-radius:0% !important;" >
		 <p>
	 			Hello , Owner Welecome in Human Resource Managment.
		 </p>

	</aside>
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