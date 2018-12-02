<?php

require_once '../con.php';

// Cek if clicked
if (isset($_GET['id'])) {

    // Get sent data
    $id_user = $_GET['id'];

    // Delete data
    $query = "delete from users where id_user='$id_user' and role='member'";
    $delete = mysqli_query($con, $query);
    $queryLearn = "delete from learn where id_user='$id_user'";
    $deleteLearn = mysqli_query($con, $queryLearn);
    $queryContent = "delete from contents where id_user='$id_user'";
    $deleteContent = mysqli_query($con, $queryContent);

    // Check if update success and send message
    if ($delete && $deleteLearn && $deleteContent) {
        session_start();
        $_SESSION['deleteMember'] = 'Member Deleted!!';
        header("Location: listmember.php");
        exit();
    }
}
