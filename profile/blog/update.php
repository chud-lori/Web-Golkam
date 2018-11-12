<?php

require_once '../../con.php';

// Cek if clicked
if (isset($_POST['update'])) {

    // Get sent data
    $title = $_POST['title'];
    $body = $_POST['body'];
    $idContent = $_POST['idcon'];

    // Update data
    $query = "update contents set title='$title', body='$body' where id_content = '$idContent'";
    $update = mysqli_query($con, $query);

    // Check if update success and send message
    if ($update) {
        session_start();
        $_SESSION['update'] = 'Updated!!';
        header("Location: list.php");
        exit();
    }
}