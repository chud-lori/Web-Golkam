<?php
include('../../session.php');
include('../../con.php');

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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        // Get user data
        $username = $_SESSION['login_user'];
        $user = "select id_user from users where username='$username'";
        $resUser = mysqli_query($con, $user);
        $dataUser = mysqli_fetch_array($resUser);
        $idUser = $dataUser['id_user'];

        // Get count
        $query = "select count(id_content) as total from contents where id_user='$idUser'";
        $exe = mysqli_query($con, $query);
        $result = mysqli_fetch_array($exe);
    ?>
    <h1>Total tulisan mu: <?php echo $result['total']; ?></h1>
</body>
</html>
<?php
}
else{
	header("location: ../../login");
}
?>
