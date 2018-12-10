<?php

require_once '../../con.php';

// Cek if clicked
if (isset($_GET['id'])) {

    // Get sent data
   $idContent = $_GET['id'];

    // Get data
    $get = mysqli_query($con, "select * from contents where id_content='$idContent'");
    $getRow = mysqli_fetch_array($get);
    $img = $getRow['image'];
    // Delete data
    $query = "delete from contents where id_content='$idContent'";
    $deletePict = unlink('../../images/content/'.$img); // delete image file
    $delete = mysqli_query($con, $query);

    // Check if update success and send message
    if ($delete && $deletePict) {
        session_start();
        $_SESSION['delete'] = 'Deleted!!';
        header("Location: list.php");
        exit();
    }
}