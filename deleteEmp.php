<?php
 	require "../session/session.php"; 
 
    if(empty($_GET['codeEmployee'])){
    	header('location:delete.php?Empty= Please write  the code  :( ');
    }
    else
    {
  	 $code= (isset($_GET['codeEmployee']) ? $_GET['codeEmployee'] : null);
 	$sqlSearch = "SELECT userId  FROM EmployeeInfo WHERE codeEmp='$code'";
 	$resultSearch = mysqli_query($conn,$sqlSearch);
    $row = mysqli_fetch_array($resultSearch,MYSQLI_ASSOC);
    $count = mysqli_num_rows($resultSearch);
    $id = $row['userId'];
    $sqlDelete = " DELETE  from Users WHERE userId='$id' ";
    $resultDelete =  mysqli_query($conn,$sqlDelete);
	if($resultSearch == false ) {
		    header('location:delete.php?Empty= User not Found :(');
    }
    else
    {
    	header('location:delete.php?Empty= User Deleted Succcessfuly :)');
    }
  }
			$conn->close();

?>