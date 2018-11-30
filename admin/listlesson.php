<?php
require_once '../con.php';
session_start();

if(isset($_SESSION['login_admin'])) {

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
            if(!empty($_SESSION['deleteLesson'])) {
                $message = $_SESSION['deleteLesson'];
                echo "<h1>$message</h1>";
                unset($_SESSION['deleteLesson']);
            }
        ?>
    <?php
        session_start();
        if(!empty($_SESSION['lessonAdd'])) {
           $message = $_SESSION['lessonAdd'];
           echo "<h1>$message</h1>";
           unset($_SESSION['lessonAdd']);
        }
    ?>
    <table border=1>
        <tr>
            <th>ID</th>
            <th>Lesson Name</th>
            <th>Lesson Description</th>
            <th>Delete Lesson</th>
        </tr>
        <?php
            $query = "select * from lessons";
            $results = mysqli_query($con, $query);

            while ($data = mysqli_fetch_array($results)) {
                ?>
        <tr>
            <td>
                <?php echo $data['id_lesson'] ?>
            </td>
            <td>
                <?php echo $data['lesson_name'] ?>
            </td>
            <td>
                <?php echo substr($data['lesson_desc'], 0, 20). '...'; ?>
            </td>
            <td><a href="deletelesson.php?id=<?php echo $data['id_lesson']; ?>" onclick="return confirm('Tenane?')">Delete</a></td>
        </tr>
        <?php
            }

        ?>
    </table>
    <a href="index.php">Back Home</a>
</body>

</html>
<?php
}
else{
	header("location: login");
}
?>