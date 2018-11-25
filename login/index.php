<?php
include('login.php'); // Memasuk-kan skrip Login
include('../session.php');
echo ($_SESSION['login_user']);

// Check cookie
if (isset($_COOKIE['login_user'])) {
  $_SESSION['login_user'] = $_COOKIE['login_user'];
}

if(isset($_SESSION['login_user'])){
    header("location: ../profile");
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
			<h2>FORM LOGIN DENGAN PHP</h2><hr/>

			<label>Username :</label>
			<input id="name" name="username" placeholder="username" type="text"><br>

			<label>Password :</label>
			<input id="password" name="password" placeholder="**********" type="password"><br>

      <input type="checkbox" name="remember" value="remember">
      <label>Remember me</label><br>

			<input type="submit" name="submit" id="submit" value="Login">
		  </form>
		</div>
   </div>

  </body>
</html>
