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
    		 <figcaption> Human Resource </figcaption>
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
	<form action="insert.php" method="POST" id="myForm" enctype="multipart/form-data">
	<h1>Add Employee</h1>
	<label> Code  </label>
	<input onblur="validInput(this ,'code','Code Number')" type="text" placeholder="201620844"   name="codeEmployee"required >
		<br>
		<label> Username  </label>
	<input  onblur="validInput(this ,'username' , 'User-name ')"type="text" placeholder="username"   name="user-name"required >
		<br>
		<label> Premission </label>
	  <select id="userPremissions" name="premission"  >
	 	<option value= "Please select the premission" selected >  Please select the Premissions </option>
				<option value="read"> read </option>
				<option value="write"> write</option>
				</select>
		 <label> Profile   </label>
				<input type="file" id="user-profile"  name="profileEmployee"  />
				<input type="submit" value="upload" />


<br>
		 <label> Finger Print </label>
				<input type="text" name="finger-print"  name="fingerPrintEmployee"/>

<br>

		<label> Name  </label>
		<br>
				<div id="ctextf">
		<input onblur="validInput(this ,'firstname','First-Name')" type="text" placeholder="Frist-Name"  name="fristNameEmployee" required >
	</div>
	<div id="ctextl">
		<input onblur="validInput(this ,'lastname','First-Name')" type="text" placeholder="Last-Name" name="lastNameEmployee" required >
	</div>
	<br>
	<label> Phone </label>
	<br>
	<div id="cphonel">
		<select id="codeCountry">
			<option value="code-county" selected  ></option>
			<option value="egypt">+02</option>
			<option value="sudan">+249</option>
		</select>
</div>
	<div id="cphoner">
		<input onblur="validInput(this ,'number','Phone Number ')" type="text" placeholder="Mobile Number" required name="phoneEmployee" >
	</div>
	<br>
		<br>
		<label>Personal-Email </label>
		<input onblur="validInput(this ,'personalEmail','Personal-Email')" type="text" placeholder="ex@domain.com" id="email"  name="personalEmailEmployee" required>
		<br>

		<label>Organizational-Email</label>
		<input onblur=" validInput(this ,'organizationalEmail','Organizational-Email')" type="text" placeholder="ex@domain.edu" name="organizationalEmailEmployee" required >
		<br>

			<!--
					Testing String 
					-------------------
				   AA!45aaa valid
                   AA!45aa  invalid
                   AA45aaaa valid
                   AA 45aaa invalid
                   AA@!5aaa valid
                   aa@!5aaa invalid
                   

			 -->
		<label for="password" >Password </label>
		<input  type="password" placeholder="password" id="password" onkeyup="matchPassword();"  name="passwordEmployee"  required >
		<br>

		<label for="repassword">Re-write Password </label>
		<input type="password" placeholder="re-write password" id = "repassword" onkeyup="matchPassword(); "  name='pass' required >
		<br>
		 <span id='matchMessage'> </span> 
		 <br>
      <label> Faculty </label>
	  <select id="faculty" name="Faculty"  name="facultydEmployee" >
	 	<option value= "Please select the Facutly" selected  >  Please select the Facutly </option>
				<option value="Computer Science"> Computer Science </option>
				<option value="Computer Engineering"> Computer Engineering</option>
				<option value="Accounting "> Accounting </option>
				<option value="Law "> Law </option>
				<option value="Architurae "> Architurae</option>
				<option value="Art "> Art</option>
			</select>
	 <label> Department </label>
	 <select id="department" name="departmentEmployee" >
	 		    <option value="Please select the Department" selected > Please select the Department </option>
				<option value="IT" > IT </option>
				<option value="Sales" >Sales </option>
				<option value="HR" >  Hr </option>
			</select>

		<label> Country </label>
			<select id="country" name="countryEmployee" >
				<option value="Please select the Counrty" selected > Please select the Counrty </option>
				<option value="egypt" >  Egypt</option>
				<option value="Italy"> Italy </option>
				<option value="USA">  USA </option>
				<option value="England"> England</option>
				<option value="France">  France</option>
			</select>
				<label> Nationality </label>
			<select id="nationality" name="nationalityEmployee" >
				<option value="Please select the Nationality" selected > Please select the Nationality</option>
				<option value="Egyptian" > Egyptian</option>
				<option value="Italyian"> Italyian</option>
				<option value="USA"> USA</option>
				<option value="England"> England</option>
				<option value="France">France</option>
			</select>
		<br>
		<label>Birthdate</label>
		<input type="date" name="Birthdate" name="brithdateEmployee" >
			<br>
			<label> Hiring-Date </label>
			<input type="date" name="Hiring-Date" name="hiringdataEmployee" >
			<br>
		<label>	RF card No </label>
		<input type="text" name="rf-card" name="rfcardEmployee"  required >
			<br>				 
			<label>  Gross Salary</label>
		<input onblur="validInput(this ,'grossSalary','Gross Salary ')" type="text" name="grossSalaryEmployee" required >
			<br>
			<label>  Address </label>
		<input  type="text" name="addressEmployee"required  >
			<br>
			<label> Describe job </label>
		<textarea name="description" size="100"  required  name="describeJobEmployee" > Describe your job`s employee  </textarea>

			
		<label> Gender </label>
		<input onblur="validInput(this ,'radio' , 'Radio Button')" type="radio" name="gender" value="male"  >Male  
		<input  onblur="validInput(this ,'radio' , 'Radio Button')" type="radio" name="gender" value="female" >Female<br>
		<br>
	<?php if(@$_GET['Empty']==true)
	{
	?>
	<div class="alert" style="color:red;"><?php echo $_GET['Empty']; ?> </div>
	<?php
    }
	?>

	<input  onclick="clickButton('btn')" type="submit" id="btn" name="submit"value="Add" >
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
		<h4 align="right">&copy 2019 Thebes. A created by MIR7OKAKEMO </h4>
		</section>
	</footer>
   <script type="text/javascript" src="../js/valid.js"></script>
   </script>

</body>
</html>