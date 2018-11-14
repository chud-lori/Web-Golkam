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
include('session.php');
?>
<nav>
<?php
if (isset($_SESSION['login_user'])) {
    ?>
    <h1>Halo <?php echo $_SESSION['login_user'] ?></h1>
    <span><a href="profile">Masuk profile</a></span>
<?php
}
else{
    ?>
    <h1><a href="login/">Login</a></h1><br>
    <h1><a href="register/">Register</a></h1><br>
<?php
}
?>
</nav>
    
</body>
</html>