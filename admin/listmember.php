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
            if(!empty($_SESSION['deleteMember'])) {
                $message = $_SESSION['deleteMember'];
                echo "<h1>$message</h1>";
                unset($_SESSION['deleteMember']);
            }
        ?>
    <table border=1>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Username</th>
            <th>Delete Member</th>
        </tr>
        <?php
            $query = "select * from users where role='member'";
            $results = mysqli_query($con, $query);

            while ($data = mysqli_fetch_array($results)) {
                ?>
                <tr>
                    <td><?php echo $data['id_user'] ?></td>
                    <td><?php echo $data['name'] ?></td>
                    <td><?php echo $data['username']; ?></td>
                    <td><a href="deletemember.php?id=<?php echo $data['id_user']; ?>" onclick="return confirm('Tenane?')">Delete</a></td>
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
