<?php
error_reporting(E_ALL); ini_set('display_errors', '1');
require_once '../con.php';

$lesson_name = $_POST['lessonname'];
$lesson_desc = $_POST['lessondesc'];
$submit = $_POST['submitlesson'];

if (isset($submit)) {
    $query = "insert into lessons(lesson_name, lesson_desc) values('$lesson_name', '$lesson_desc')";
    $add = mysqli_query($con, $query);
    if ($add) {
        session_start();
        $_SESSION['lessonAdd'] = 'Lesson added!!';
        header("Location: listlesson.php");
        exit();
    }
}