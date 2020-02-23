
/*Check Validation of Code  number or not  */
function validInput(input, flag , nameInput){
// validation of Code  , you must be the Number 
 "use strict";
if(flag == 'code'|| flag == 'grossSalary' || flag =='codeSearch') {
if(isNaN(input.value)){
	alert(  nameInput + " is not  Number ");
	}
}

if(falg =='code'){
 var patternCode  = /^[2016]{4}\d{4}$/; 
if(patternCode.test(input.value)){
			alert(nameInput + " , Please enter number 2016 with 4 number  ! ");
		}
}
if(flag == 'number') {
if(isNaN(input.value)){
	alert(  nameInput + " is not  Number ");
	}

}

/* validation of Address  , you must less than fifthen number */
	if(flag == "address"){
		if(input.value.length() > 15 ){
 		alert(nameInput + " Must be smaller than fifthen ");}
		}

		if(flag == 'number'){
			var patternNumber  = /^(01)+\d{8}$/; 
		if(patternNumber.test(input.value)){
			alert(nameInput + " , Please enter number 01 with 9 number  ! ");
		}}
/* validation of personal  Email  or organizational Email  , you must check  @ , domain and   dot  */
	if(flag == "personalEmail" ||  flag == "organizationalEmail" ){
		var mailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		if(mailFormat.test(input.value) && !isempty(input.value)  ){
			alert(nameInput + " , please Check the validation ! ");
		} 
	}
// validation of Radid Button , you must check male or female   

	if(flag == "radio")
	{
		if(!input.checked) {
			alert("You must check " + nameInput +" value male or female ")
		}

	}}
function clickButton(idBtn) {
		var selectCode = document.getElementById("codeCountry") ;
		var selectFaculty = document.getElementById("faculty") ;
		var selectDepartment = document.getElementById("department") ;
		var selectNationality = document.getElementById("nationality") ;
		var selectCounrty = document.getElementById("country") ;
		var selectuserPremissions = document.getElementById("userPremissions") ;
		var selectuserType = document.getElementById("userType") ;


		if (selectFaculty.value == "Please select the Facutly" || selectDepartment.value == "Please select the Department" || selectNationality.value == "Please select the Nationality" || selectCounrty.value=="Please select the Counrty"  ||selectCode.value=="code-county"|| selectuserPremissions.value=="Please select the premission" ||selectuserType.value=="Please select the UserType" )
			alert( "Please Select the value ");
		

	var profile = document.getElementById("user-profile");
	if(!/(\.bmp|\.gif|\.jpg|\.jpeg)$/i.text(profile.value)){
		alert("Exenstion profile is invalid ! ");

	}
	}
 var matchPassword = function () {
  if (document.getElementById('password').value == document.getElementById('repassword').value) {
      
    document.getElementById('matchMessage').style.color = 'green';
    document.getElementById('matchMessage').innerHTML = 'Matching ';
  } else {
    document.getElementById('matchMessage').style.color = 'red';
    document.getElementById('matchMessage').innerHTML = 'not Matching';
  }
}

function validSalary(input, flag , nameInput ) {
	 "use strict";
if(flag == 'HoursInDay' || flag == 'HoursInMonth' || flag == 'incomeTax' || flag == 'socialSecurity' || flag == 'bounsInHours' || flag == 'priceOfMission' || flag == 'priceOfHoure' ) {
if(isNaN(input.value)){
	alert(  nameInput + " is not valid Number   ");
	}
}
}
