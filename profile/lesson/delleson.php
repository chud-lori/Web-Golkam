<?php

require_once '../../con.php';

// Check if clicked
if (isset($_GET['idlesson']) && isset($_GET['iduser'])) {

    // Get sent data
    $id_lesson = $_GET['idlesson'];
    $id_user = $_GET['iduser'];

    // Delete data
    $query = "delete from learn where id_user='$id_user' and id_lesson='$id_lesson'";
    $delete = mysqli_query($con, $query);

    // Check if update success and send message
    if ($delete) {
        session_start();
        $_SESSION['deleteLearn'] = 'Learn Deleted!!';
        header("Location: index.php");
        exit();
    }
}
