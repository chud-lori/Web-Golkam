<?php
// include('sessionAdmin.php');
// Start session
session_start();

if(isset($_SESSION['login_admin'])) {

?>
<!DOCTYPE html>
<html>
	<head>
	  <title>Profile</title>
	  <!-- <link href="style.css" rel="stylesheet" type="text/css"> -->
	</head>
<body>
	<?php
        session_start();
        if(!empty($_SESSION['register'])) {
           $message = $_SESSION['register'];
           echo "<h1>$message</h1>";
           unset($_SESSION['register']);
        }
    ?>
	<b id="welcome">Selamat Datang : Admin <i><?php echo $_SESSION['login_admin']; ?></i></b>
	|||
	<b id="logout"><a href="logout.php">Log Out</a></b>
	<hr>
</body>
</html>
<?php
}
else{
	header("location: login");
}
?>
