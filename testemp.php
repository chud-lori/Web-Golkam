<?php

require_once 'con.php';
$halaman = 10;
$page = isset($_GET['page'])? (int)$_GET['page']:1;
$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
$query =  mysqli_query($con, "select * from contents limit '$mulai', '$halaman'");
$sql = mysqli_query($con, "select * from contents");
$total = mysqli_num_rows($sql);
$pages = ceil($total/$halaman);
for ($i=1; $i<=$pages ; $i++) { 
    ?>
    <a href="?page=<?php echo $i; ?>"><?php echo $i ?></a>

    <?php
    
}