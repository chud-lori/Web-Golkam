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
        // get content will edit
        $idContent = $_GET['id'];

        // Get user data
        $username = $_SESSION['login_user'];
        $user = "select id_user from users where username='$username'";
        $resUser = mysqli_query($con, $user);
        $dataUser = mysqli_fetch_array($resUser);
        $idUser = $dataUser['id_user'];

        // Get content of user
        $query = "select * from contents where id_content = '$idContent' and id_user = '$idUser'";
        $resEdit = mysqli_query($con, $query);

        if (mysqli_num_rows($resEdit) == 0) {
			echo "<h1>Salah cuk!</h1>";
			}
		else{
            $data = mysqli_fetch_array($resEdit);
    ?>
            <form action="update.php" method="post">
                Title:<input type="text" name="title" value="<?php echo $data['title']; ?>"><br>
                Body:<input type="text" name="body" value="<?php echo $data['body']; ?>"><br>
                <input type="hidden" value="<?php echo $data['id_content'] ?>" name="idcon">
                <input type="submit" name="update" value="Update!">
            </form>
    <?php
            }
    ?>
</body>
</html>