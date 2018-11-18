<?php

require_once '../con.php';

// Cek if clicked
if (isset($_GET['id'])) {


    // Get sent data
    $id_lesson = $_GET['id'];

    // Delete data
    $query = "delete from lessons where id_lesson='$id_lesson'";
    $delete = mysqli_query($con, $query);
    $queryLearn = "delete from learn where id_lesson='$id_lesson'";
    $deleteLearn = mysqli_query($con, $queryLearn);

    // Check if update success and send message
    if ($delete && $deleteLearn) {
        session_start();
        $_SESSION['deleteLesson'] = 'Lesson Deleted!!';
        header("Location: listlesson.php");
        exit();
    }
}