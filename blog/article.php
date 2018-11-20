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
    // Get article data
    require_once '../con.php';
    $article = abs((int)$_GET['id']);
    $contentQuery = "select * from contents where id_content='$article'";
    $contentExe = mysqli_query($con, $contentQuery);
    $contentResult = mysqli_fetch_array($contentExe);
    if (mysqli_num_rows($contentExe) > 0) {
        ?>
        <img src="../images/content/<?php echo $contentResult['image'];?>" alt="image">
        <?php
        echo $contentResult['body'];
        // Get writer
        $userQuery = "select users.name from contents, users where users.id_user = contents.id_user and id_content='$article'";
        $userExe = mysqli_query($con, $userQuery);
        $userResult = mysqli_fetch_array($userExe);
        echo "<br/>Ditulis oleh ".$userResult['name'];
    }
    else{
        include '../404.php';
    }
    ?>
</body>
</html>