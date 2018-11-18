<?php

require_once '../../con.php';

// Cek if clicked
if (isset($_GET['id'])) {

    // Get sent data
   $idContent = $_GET['id'];

    // Delete data
    $query = "delete from contents where id_content='$idContent'";
    $delete = mysqli_query($con, $query);

    // Check if update success and send message
    if ($delete) {
        session_start();
        $_SESSION['delete'] = 'Deleted!!';
        header("Location: list.php");
        exit();
    }
}