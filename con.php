<?php
  // $user = 'root';
  // $pass = 'root';
  // $host = 'localhost';
  // $db = 'seatap';

  // $con=mysqli_connect($host,$user,$pass);
  // mysqli_select_db($con,$db) or Die("Failed to reach database");
	$servername = "localhost";
	$usernamedb = "root";
	$passworddb = "root";
	$dbname = "golkam";

	// Create connection
	$con = new mysqli($servername, $usernamedb, $passworddb, $dbname);
	// Check connection
	if ($con->connect_error) {
	    die("Connection failed: " . $con->connect_error);
	} 

?>