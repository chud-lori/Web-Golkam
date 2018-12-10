<?php
    include '../templates/header.php';
    // config
    require_once '../con.php';
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
    <form action="index.php" method="get">
        <input type="text" name="keyword" id="">&nbsp;
        <input type="submit" value="Cari" name="search">
    </form>
    <?php
    // Pagination
    $jumlahDataPerhalaman = 3;
    $result = mysqli_query($con, "select * from contents");
    $jumlahData = mysqli_num_rows($result);
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
    $halamanAktif = isset($_GET['page']) ? $halamanAktif = $_GET['page'] : 1;
    $awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;
    // Get article data
    $query = "select contents.*, users.name from contents, users where users.id_user = contents.id_user order by id_content desc limit $awalData, $jumlahDataPerhalaman";
    $queryExe = mysqli_query($con, $query);

    // Search
    $searchSubmit = $_GET['search'];
    $keyword = htmlentities($_GET['keyword']);
    if (isset($searchSubmit)) {
        $keywordQuery = "select contents.*, users.name from contents, users where users.id_user = contents.id_user and title like '%$keyword%' or body like '%$keyword%' order by id_content desc";
        $resultKeyword = mysqli_query($con, $keywordQuery);

        echo "<h2>Hasil pencarian untuk $keyword</h2>";
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

        while ($data = mysqli_fetch_array($queryExe)) {
            ?>
                <ul>
                    <li>
                        <a href="article.php?id=<?php echo $data['id_content'];?>"><?php echo $data['title'];?></a><br>
                        <p><?php echo substr(strip_tags($data['body']), 0, 100). '...'; ?></p>
                        <span>Ditulis oleh: <?php echo $data['name']; ?></span>
                    </li>
                </ul>
            <?php
        }
    }
    ?>
    <!-- Navigasi pagination -->
    <?php 
    // Panah balik
        if ($halamanAktif > 1) {?>
            <a href="?page=<?= $halamanAktif - 1; ?>">&laquo;</a>
        <?php
        }
        for ($i=1; $i <= $jumlahHalaman ; $i++) { 

            if ($i == $halamanAktif) {?>
                <a href="?page=<?= $i; ?>" style="font-weight: bold; color:red;"><?= $i; ?></a>
            <?php
            }
            else{?>
                <a href="?page=<?= $i; ?>"><?= $i; ?></a>
            <?php
            }
        
        }
    // Panah kanan
    if ($halamanAktif < $jumlahHalaman) {?>
        <a href="?page=<?= $halamanAktif + 1; ?>">&raquo;</a>
    <?php
    }
    ?>
</body>
</html>
