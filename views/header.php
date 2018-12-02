<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
<?php
include('../session.php');
?>
<nav>
<?php

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
    <h1>Halo <?php echo $_SESSION['login_user'] ?></h1>
    <span><a href="/golkam/profile">Masuk profile</a></span>
<?php
}
else{
    ?>
    <h1><a href="/golkam/login/">Login</a></h1><br>
    <h1><a href="/golkam/register/">Register</a></h1><br>
<?php
}
?>
</nav>

</body>
</html>
