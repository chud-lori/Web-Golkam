<?php
include('../../session.php');

if(isset($_SESSION['login_user'])) {

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
    <form action="store.php" method="post" enctype="multipart/form-data">
        <label for="">Title</label>
        <input type="text" name="title_content"><br>
        <label for="">Image</label>
        <input type="file" name="img_content"><br>
        <label for="">Konten</label>
        <textarea name="body_content" id="" cols="30" rows="10"></textarea><br>
        <input type="submit" name="submit_content" value="Post!">
    </form>
</body>
</html>

<?php
}
else{
	header("location: ../../login");
}
?>
