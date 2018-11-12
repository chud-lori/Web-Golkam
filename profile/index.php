<?php
include('../session.php');

if(isset($_SESSION['login_user'])) {

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
        if(!empty($_SESSION['postStore'])) {
           $message = $_SESSION['postStore'];
           echo "<h1>$message</h1>";
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
	<b id="welcome">Selamat Datang : <i><?php echo $_SESSION['login_user']; ?></i></b>
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
