<?php
include('../../session.php');

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
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
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
