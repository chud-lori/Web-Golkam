<?php
include('../session.php');

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
	}
  }
  
if(isset($_SESSION['login_user'])){

?>
<!DOCTYPE html>
<html>

<head>
	<title>Profile</title>
	<!-- <link href="style.css" rel="stylesheet" type="text/css"> -->
</head>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<style>
	.success-popup {
		transition: .3s ease all;
		font-family: 'Roboto', sans-serif;
	}
</style>

<body>
	<?php
        session_start();
        if(!empty($_SESSION['postStore'])) {
           $message = $_SESSION['postStore'];
           echo "$message";
           unset($_SESSION['postStore']);
        }
    ?>
	<?php
        session_start();
        if(!empty($_SESSION['register'])) {
           $message = $_SESSION['register'];
           echo "<h1>$message</h1>";
           unset($_SESSION['register']);
        }
    ?>
	<b id="welcome">Selamat Datang : <i>
			<?php echo $_SESSION['login_user']; ?></i></b>
	|||
	<b id="logout"><a href="logout.php">Log Out</a></b>
	<hr>
	<ul>
		<li>
			<a href="blog/create.php">Buat post</a>
		</li>
		<li>
			<a href="blog/list.php">Daftar</a>
		</li>
		<li>
			<a href="lesson">Belajar</a>
		</li>
	</ul>
</body>

</html>
<?php
}
else{
	header("location: ../login");
}
?>