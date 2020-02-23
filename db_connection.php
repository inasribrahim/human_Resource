<?php
	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'hr';

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
	    die("Please Check the Connections  " . $conn->connect_error);
	}			   
?>