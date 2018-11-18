<?php
session_start();

if(isset($_SESSION['login_admin'])) {

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Golkam</title>
</head>
<body>
    <form action="storelesson.php" method="post">
        <label for="">Lesson name</label>
        <input type="text" name="lessonname" id=""><br>
        <label for="">Lesson description</label>
        <textarea name="lessondesc" id="" cols="30" rows="10"></textarea>
        <br><br>
        <input type="submit" value="Add Lesson" name="submitlesson">
    </form>
</body>
</html>
<?php
}
else{
	header("location: login");
}
?>