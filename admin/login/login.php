<?php
// Start session
session_start();
require_once '../../con.php';
// include('../sessionAdmin.php');
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
		$queryLogin = "select * from users where username='$username' and role='admin'";
		$resultLogin = mysqli_query($con, $queryLogin);
		$data = mysqli_fetch_array($resultLogin);
		// if ("") {
		// 	# code...
		// } else {
		// 	# code...
		// }

		if (mysqli_num_rows($resultLogin) > 0) {
			// Verify password bcrypt hash
			if (password_verify($password, $data['password'])) {
				$_SESSION['login_admin'] =  $username;// Membuat sesi/session
				$data_user = mysqli_query($konek, "select * from users where username='$username'");
				$data = mysqli_fetch_array($data_user);
				$_SESSION['role_user'] = $data['role']; // Role user session
				header("location: ../.php"); // Mengarahkan ke halaman profil
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