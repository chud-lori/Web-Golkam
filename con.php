<?php
  // $user = 'root';
  // $pass = 'root';
  // $host = 'localhost';
  // $db = 'seatap';

  // $con=mysqli_connect($host,$user,$pass);
  // mysqli_select_db($con,$db) or Die("Failed to reach database");
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "golkam";

	// Create connection
	$con = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($con->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

?>