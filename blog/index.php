<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="get">
        <input type="text" name="keyword" id="">&nbsp;
        <input type="submit" value="Cari" name="search">
    </form>
    <?php
    include '../templates/header.php';
    // config
    require_once '../con.php';
    // Search
    $searchSubmit = $_GET['search'];
    $keyword = $_GET['keyword'];
    if (isset($searchSubmit)) {
        $keywordQuery = "select contents.*, users.name from contents, users where users.id_user = contents.id_user and title like '%$keyword%'";
        $resultKeyword = mysqli_query($con, $keywordQuery);
        if (mysqli_num_rows($resultKeyword) > 0) {
            while ($dataSearch = mysqli_fetch_array($resultKeyword)) {
                ?>
                    <ul>
                        <li>
                            <a href="article.php?id=<?php echo $dataSearch['id_content'];?>"><?php echo $dataSearch['title'];?></a><br>
                            <span>Ditulis oleh: <?php echo $dataSearch['name']; ?></span>
                        </li>
                    </ul>
                <?php
            }
        }
        else {
            echo "<h1>Artikel e ra enek cuk</h1>";
        }
    }
    else{
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
    }
    ?>
</body>
</html>