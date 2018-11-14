<?php
// error_reporting(E_ALL);
// ini_set("display_errors", 1);
include('login.php'); // Memasuk-kan skrip Login 
// Start session
session_start();
echo ($_SESSION['login_admin']);
if(isset($_SESSION['login_admin'])){
    header("location: ../");
}
?>
 
<!DOCTYPE html>
<html>
  <head>
    <title>Form Login</title>
	
	<!-- Skrip CSS -->
   <!-- <link rel="stylesheet" href="style.css"/> -->
  
  </head>	
  <body>
	<div class="container">
		<div class="main">
	      <form action="" method="post">
			<h2>LOGIN Admin</h2><hr/>		
			
			<label>Username :</label>
			<input id="name" name="username" placeholder="username" type="text">
			
			<label>Password :</label>
			<input id="password" name="password" placeholder="**********" type="password">
			
			<input type="submit" name="submit" id="submit" value="Login">
		  </form>
		</div>
   </div>
 
  </body>
</html>