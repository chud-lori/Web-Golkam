<?php
include('login.php'); // Memasuk-kan skrip Login
include('../session.php');
error_reporting(E_ALL); ini_set('display_errors', '1');

// Check cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
  // Initiaion to variable
  $id  = $_COOKIE['id'];
  $key = $_COOKIE['key'];

  // Get user data from id
  $result = mysqli_query($con, "select * from users where id_user = '$id' and role='member'");
  $row    = mysqli_fetch_array($result);

  // Check cookie and username
  if ($key === hash('sha256', $row['username'])) {
    // Duplicate session
    $_SESSION['login_user'] =  $row['username'];
    $_SESSION['name'] =  $row['name'];
    $_SESSION['iduser'] =  $row['id_user'];
  }
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
      <h3>Ga punya akun?</h3>
      <a href="/golkam/register">Daftar</a>
		</div>
   </div>

  </body>
</html>
