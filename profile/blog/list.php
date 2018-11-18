<?php
include('../../session.php');
include('../../con.php');

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
        // Get user data
        $username = $_SESSION['login_user'];
        $user = "select id_user from users where username='$username'";
        $resUser = mysqli_query($con, $user);
        $dataUser = mysqli_fetch_array($resUser);
        $idUser = $dataUser['id_user'];

        // Get content of user
        $query = "select * from contents where id_user = '$idUser'";
        $res = mysqli_query($con, $query);
        if (mysqli_num_rows($res) == 0) {
            include 'nopost.html';
        }
    ?>
    	<?php
            session_start();
            if(!empty($_SESSION['update'])) {
                $message = $_SESSION['update'];
                echo "<h1>$message</h1>";
                unset($_SESSION['update']);
            }
        ?>
        <?php
            session_start();
            if(!empty($_SESSION['delete'])) {
                $message = $_SESSION['delete'];
                echo "<h1>$message</h1>";
                unset($_SESSION['delete']);
            }
        ?>
        <table border='1'>
            <tr>
                <th>Title</th>
                <th>Review</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
            // Show data
            while ($data = mysqli_fetch_array($res)) {
            ?>
            <tr>
                <td><a href="../../blog/article.php?id=<?php echo $data['id_content']; ?>"><?php echo htmlentities($data['title']); ?></a></td>
                <td><?php echo substr($data['body'], 0, 8). '...'; ?></td>
                <td><a href="edit.php?id=<?php echo $data['id_content']; ?>">Edit</a></td>
                <td><a href="delete.php?id=<?php echo $data['id_content']; ?>" onclick="return confirm('Tenane?')">Delete</a></td>
            </tr>
            <?php
            }
            ?>
        </table>
    <?php
    ?>
</body>
</html>
<?php
}
else{
	header("location: ../../login");
}
?>
