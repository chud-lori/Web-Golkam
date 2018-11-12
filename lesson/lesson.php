<?php
include('../session.php');
require_once '../con.php';

if(isset($_SESSION['login_user'])) {

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
    <?php
        session_start();
        if(!empty($_SESSION['lessonGet'])) {
            $message = $_SESSION['lessonGet'];
            echo "<h1>$message</h1>";
            unset($_SESSION['lessonGet']);
        }
    ?>
    <?php
        error_reporting(E_ALL); ini_set('display_errors', '1');
        // Get id lesson
        $idLesson = $_GET['id'];

        // Get user Data
        $user = $_SESSION['login_user'];
        $getExe = mysqli_query($con, "select * from users where username='$user'");
        $getDataUser = mysqli_fetch_array($getExe);
        $idUser = $getDataUser['id_user'];

        // Get lesson data
        $queryLesson = "select * from lessons where id_lesson='$idLesson'";
        $resultLesson = mysqli_query($con, $queryLesson);
        $data = mysqli_fetch_array($resultLesson);

        // Check lesson added or not
        $queryCheck = "select * from learn where id_user='$idUser' and id_lesson='$idLesson'";
        $resultCheck = mysqli_query($con, $queryCheck);
        $w = mysqli_fetch_array($resultCheck);

        if(mysqli_num_rows($resultCheck) > 0){
            echo "<input type='' value='Add' disabled><br/><span>Already added to your account</span>";
        }
        else{
            echo "<a href='lessonget.php?id=".$idLesson."'>Add</a>";
        }

        ?>
        <h1><?php echo $data['lesson_name']; ?></h1><hr>
        <span><?php echo $data['lesson_desc']; ?></span>
        

</body>
</html>
<?php
}
else{
	header("location: ../login");
}
?>