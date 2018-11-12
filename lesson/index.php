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
        require_once '../con.php';
        $query = "select * from lessons";
        $result = mysqli_query($con, $query);

        while ($data = mysqli_fetch_array($result)) {
            ?>
            <span><a href="lesson.php?id=<?php echo $data['id_lesson'] ?>"><?php echo $data['lesson_name'] ?></a></span><br>
        
        <?php
        }

    ?>
</body>
</html>