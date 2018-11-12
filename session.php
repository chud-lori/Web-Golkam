<?php
require_once 'con.php';
session_start();// Memulai Session
// Menyimpan Session
$user_check=$_SESSION['login_user'];
// Ambil nama user berdasarkan username dengan mysql_fetch_assoc
$ses_sql=mysqli_query("select name from users where username='$user_check'", $con);
$row = mysqli_fetch_array($ses_sql);
$login_session =$row['name'];
// if(!isset($login_session)){
// 	mysqli_close($con); // Menutup koneksi
// 	header('Location: login'); // Mengarahkan ke Home Page
// }
?>