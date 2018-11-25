<?php
include('../../session.php');
require_once '../../con.php';

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
      if(!empty($_SESSION['deleteLearn'])) {
          $message = $_SESSION['deleteLearn'];
          echo "<h1>$message</h1>";
          unset($_SESSION['deleteLearn']);
      }
  ?>
    <?php
        error_reporting(E_ALL); ini_set('display_errors', '1');
        // Get user Data
        $user = $_SESSION['login_user'];
        $getExe = mysqli_query($con, "select * from users where username='$user'");
        $getDataUser = mysqli_fetch_array($getExe);
        $idUser = $getDataUser['id_user'];

        // Get lesson learned
        $queryLearn = "select learn.*, users.id_user, users.username, users.name, lessons.* from learn, users, lessons where learn.id_user = users.id_user and learn.id_lesson = lessons.id_lesson and users.id_user=$idUser";
        $resultLearn = mysqli_query($con, $queryLearn);
        echo "<h1>Yang Kamu Ambil:</h1>";
        while ($data = mysqli_fetch_array($resultLearn)) {
            ?>
            <ul>
                <li>
                    <?php echo $data['lesson_name']; ?> <td><a href="delleson.php?iduser=<?php echo $data['id_user']; ?>&idlesson=<?php echo $data['id_lesson']; ?>" onclick="return confirm('Tenane?')">Delete</a></td>
                </li>
            </ul>
        <?php
        }
    ?>
</body>
</html>
<?php
}
else{
	header("location: ../../login");
}
?>
