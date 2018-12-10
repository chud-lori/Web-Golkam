<?php
include('login.php'); // Memasuk-kan skrip Login
include('../session.php');
error_reporting(E_ALL); ini_set('display_errors', '1');

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
    header("location: ../profile");
}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <style type="text/css">
      /*custom font*/
      @import url(https://fonts.googleapis.com/css?family=Montserrat);

      /*basic reset*/
      * {margin: 0; padding: 0;}

      html {
        height: 100%;
        /*Image only BG fallback*/
        
        /*background = gradient + image pattern combo*/
        background: 
        linear-gradient(rgba(196, 102, 0, 0.6), rgba(155, 89, 182, 0.6));      }

      body {
        font-family: montserrat, arial, verdana;
      }
      /*form styles*/
      #msform {
        width: 400px;
        margin: 50px auto;
        text-align: center;
        position: relative;
      }
      #msform fieldset {
        background: white;
        border: 0 none;
        border-radius: 3px;
        box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
        padding: 20px 30px;
        box-sizing: border-box;
        width: 80%;
        margin: 0 10%;
        
        /*stacking fieldsets above each other*/
        position: relative;
      }
      /*Hide all except first fieldset*/
      #msform fieldset:not(:first-of-type) {
        display: none;
      }
      /*inputs*/
      #msform input, #msform textarea {
        padding: 15px;
        border: 1px solid #ccc;
        border-radius: 3px;
        margin-bottom: 10px;
        width: 100%;
        box-sizing: border-box;
        font-family: montserrat;
        color: #2C3E50;
        font-size: 13px;
      }
      /*buttons*/
      #msform .action-button {
        width: 100px;
        background: #27AE60;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 1px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 5px;
      }
      #msform .action-button:hover, #msform .action-button:focus {
        box-shadow: 0 0 0 2px white, 0 0 0 3px #27AE60;
      }
      /*headings*/
      .fs-title {
        font-size: 15px;
        text-transform: uppercase;
        color: #2C3E50;
        margin-bottom: 10px;
      }
      .fs-subtitle {
        font-weight: normal;
        font-size: 13px;
        color: #666;
        margin-bottom: 20px;
      }
      /*progressbar*/
      #progressbar {
        margin-bottom: 30px;
        overflow: hidden;
        /*CSS counters to number the steps*/
        counter-reset: step;
      }
      #progressbar li {
        list-style-type: none;
        color: white;
        text-transform: uppercase;
        font-size: 9px;
        width: 33.33%;
        float: left;
        position: relative;
      }
      #progressbar li:before {
        content: counter(step);
        counter-increment: step;
        width: 20px;
        line-height: 20px;
        display: block;
        font-size: 10px;
        color: #333;
        background: white;
        border-radius: 3px;
        margin: 0 auto 5px auto;
      }
      /*progressbar connectors*/
      #progressbar li:after {
        content: '';
        width: 100%;
        height: 2px;
        background: white;
        position: absolute;
        left: -50%;
        top: 9px;
        z-index: -1; /*put it behind the numbers*/
      }
      #progressbar li:first-child:after {
        /*connector not needed before the first step*/
        content: none; 
      }
      /*marking active/completed steps green*/
      /*The number of the step and the connector before it = green*/
      #progressbar li.active:before,  #progressbar li.active:after{
        background: #27AE60;
        color: white;
      }



    
    </style>
    <link rel="icon" type="image/x-icon" href="../favicon/apple-icon.png" />
    </head>
    <body>

<form id="msform" action="" method="post">
  <!-- progressbar -->
  <!-- fieldsets -->
  <fieldset>
    <a href="../"><img class="mb-4" src="/golkam/assets/frontend/assets/images/index.png" alt="" width="100" height="100"></a>
    <h2 class="fs-title">Sign In</h2>
    <form action="" method="POST">
    <input type="text" name="username" placeholder="Your Username" required>
    <input type="password" name="password" placeholder="Password" required>
    Remember Me:<input type="checkbox" name="remember" value="remember">
    <input type="submit" class="next action-button" name="submit" id="submit" value="Login" />
    </form>
    <br>
    No account yet?<a href="/golkam/register" class="signup-image-link">register</a>
  </fieldset>
  
</form>
</body>
</html>

