<?php
require_once 'con.php';
// include 'admin/sessionAdmin.php';

// Cek admin exist
$cekAdmin = "select * from users where username='admin' and role='admin'";
$resultCek = mysqli_query($con, $cekAdmin);
if (mysqli_num_rows($resultCek) > 0) {
    header("location: index.php"); // Mengarahkan ke halaman profil
}

// Variable initiations
$name = 'Administrator';
$username = 'admin';
$password = 'admin123';
$password = password_hash($password, PASSWORD_BCRYPT);
$role = 'admin';

// Generate query
$regQuery = "insert into users(name, username, password, role) values('$name', '$username', '$password', '$role')";
$regAdmin = mysqli_query($con, $regQuery);

// if success redirect to admin
if ($regAdmin) {
    session_start();
    // Create session
    $_SESSION['login_admin'] = $username;
    header("location: admin"); // Mengarahkan ke halaman admin
}
else{
    echo "gagal";
}

?>