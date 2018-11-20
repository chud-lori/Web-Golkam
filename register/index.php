<?php
include('../session.php');

if(!isset($_SESSION['login_user'])) {

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
    <form action="store.php" method="post">
        <label for="">Name:</label>
        <input type="text" name="name"><br>
        <label for="">Username:</label>
        <input type="text" name="username"><br>
        <label for="">Password:</label>
        <input type="password" name="password" id="password" required><br>
        <label for="">Password confirm:</label>
        <input type="password" name="confirm_password" id="confirm_password" required><br>
        <input type="submit" value="Register" name="submit">
        <input type="reset" value="Reset">
    </form>

    <script language='javascript' type='text/javascript'>
        var password = document.getElementById("password")
        , confirm_password = document.getElementById("confirm_password");

        function validatePassword(){
            if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
</body>
</html>
<?php
}
else{
	header("location: ../profile");
}
?>