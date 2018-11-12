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
    // config
    require_once '../con.php';
    // Get article data
    $query = "select contents.*, users.name from contents, users where users.id_user = contents.id_user";
    $queryExe = mysqli_query($con, $query);

    while ($data = mysqli_fetch_array($queryExe)) {
        ?>
            <ul>
                <li>
                    <a href="article.php?id=<?php echo $data['id_content'];?>"><?php echo $data['title'];?></a><br>
                    <span>Ditulis oleh: <?php echo $data['name']; ?></span>
                </li>
            </ul>
        <?php
    }
    ?>
</body>
</html>