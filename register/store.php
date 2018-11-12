<?php
    // db config
    require_once '../con.php';
    require_once '../session.php';

    // Get data
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $username = htmlentities($username);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    // Hashing password
    $password = password_hash($password, PASSWORD_BCRYPT);
    $submit = $_POST['submit'];

    if (isset($submit)) {
        if (empty($_POST['username']) || empty($_POST['password'])){
            echo "<script>alert('Fields are required')</script>";
        }
        else{
            // Register query
            $regQuery = "insert into users(name, username, password) values('$name', '$username', '$password')";
            $reg = mysqli_query($con, $regQuery);
            if ($reg) {
                session_start();
                // Create session
                $_SESSION['login_user'] = $username;
                // Message
                $_SESSION['register'] = 'You are registered!!';
                // Redirect to profile
                header("Location: ../profile");
                exit();
            }
        }
    }