<?php

    include('../session.php');
    require_once '../con.php';

    $idLesson = $_GET['id'];
    $user = $_SESSION['login_user'];
    // Get user Data
    $getExe = mysqli_query($con, "select * from users where username='$user'");
    $getDataUser = mysqli_fetch_array($getExe);
    $idUser = $getDataUser['id_user'];

    $query = "insert into learn(id_user, id_lesson) values('$idUser', '$idLesson')";
    $result = mysqli_query($con, $query);

    if ($result) {
        session_start();
        $_SESSION['lessonGet'] = 'You added the lesson!!';
        header("Location: lesson.php?id=".$idLesson);
        exit();
    }


?>