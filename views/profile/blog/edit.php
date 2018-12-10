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
    <div class="white-box">
        <form action="update.php" method="post">
            <label for="">Title</label><br>
            <input type="text" placeholder="Blog title.." name="title" value="<?php echo $data['title']; ?>"><br><br>
            <textarea name="body" id="mymce" cols="30" rows="10"><?php echo $data['body']; ?></textarea><br>
            <input type="hidden" value="<?php echo $data['id_content'] ?>" name="idcon">
            <input type="submit" class="btn btn-primary" name="update" value="Update!">
        </form>
    </div>
    <?php
            }
    ?>
    <!-- wysuhtml5 Plugin JavaScript -->
<script src="/golkam/assets/profile/plugins/bower_components/tinymce/tinymce.min.js"></script>
    <script>
    $(document).ready(function() {
        if ($("#mymce").length > 0) {
            tinymce.init({
                selector: "textarea#mymce",
                theme: "modern",
                height: 300,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
            });
        }
    });
    </script>
</body>

</html>