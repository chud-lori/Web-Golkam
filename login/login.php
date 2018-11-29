<?php
// Start session
session_start();
include '../con.php';
$error=''; // variable to save errors
if(isset($_POST['submit'])){
	if (empty($_POST['username']) || empty($_POST['password'])){
		$error = "Username or Password is invalid";
	}
	else{
		$username = mysqli_real_escape_string($con, $_POST['username']);
		$password = mysqli_real_escape_string($con, $_POST['password']);

		// Login prevent inject php 7
		// $login = mysqli_prepare($con, "select * from users where username = ? AND password = ?");
		// mysqli_stmt_bind_param($login, "ss", $username, $_POST['password']);
		// // mysqli_execute($login);
		// // $w=mysqli_stmt_store_result($login);

		// Another way
		$queryLogin = "select * from users where username='$username' and role='member'";
		$resultLogin = mysqli_query($con, $queryLogin);

		if (mysqli_num_rows($resultLogin) > 0) {
			// Get user data
			$data = mysqli_fetch_array($resultLogin);
			// Verify password bcrypt hash
			if (password_verify($password, $data['password'])) {
				// Create session
				$_SESSION['login_user'] =  $username;
				$_SESSION['name'] =  $data['name'];
				$_SESSION['iduser'] =  $data['id_user'];
				// Cek Remember me
				if (isset($_POST['remember'])) {
					// buat cookie
					setcookie('id', $data['id_user'], time() + (60 * 60 * 24 * 30), '/');
					setcookie('key', hash('sha256', $data['username']), time() + (60 * 60 * 24 * 30), '/'); //(60 * 60 * 24 * 30)
				}
				// Redirect to profile page
				header("location: profile.php");
			}
			else {
				// Password wrong return alert
				include 'alert.html';
			}
		}
		else{
			// Data not exist return alert
			include 'alert.html';
		}

	}
}
?>
