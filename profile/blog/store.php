<?php
    // db config
    require_once '../../con.php';
    require_once '../../session.php';

    // Get data
    $title = $_POST['title_content'];
    $title = htmlentities($title);
    $body = $_POST['body_content'];
    $body = htmlentities($body);
    $submit = $_POST['submit_content'];
    $user = $_SESSION['login_user'];
    // Get directory
    $currentDir = getcwd();
    $uploadDirectory = "/../../images/content/";

    $errors = []; // Store all foreseen and unforseen errors here

    $fileExtensions = ['jpeg','jpg','png']; // Get all the file extensions

    // Recursive to prevent duplicate name
    $fileName = rand(0, 99999) . '.jpg';
    function fileNameRecu($fileName){
        $nameCheck = mysqli_query($con, "select image from contents where image='$fileName'");
        if (mysqli_num_rows($nameCheck) > 0) {
            $fileName = rand(0, 99999) . '.jpg';
            if (mysqli_num_rows($nameCheck) > 0) {
                fileNameRecu($fileName);
            }
            else{
                return $fileName;
            }
        }
        else{
            return $fileName;
        }
    }
    $fileName = fileNameRecu($fileName);
    
    // Get file data
    $fileSize = $_FILES['img_content']['size'];
    $fileTmpName  = $_FILES['img_content']['tmp_name'];
    $fileType = $_FILES['img_content']['type'];
    $fileExtension = strtolower(end(explode('.',$fileName)));

    $uploadPath = $currentDir . $uploadDirectory . basename($fileName);

    // Get user Data
    $getExe = mysqli_query($con, "select * from users where username='$user'");
    $getDataUser = mysqli_fetch_array($getExe);

    if (isset($submit)) {

        // Store to db
        $idUser = $getDataUser['id_user'];
        $query = "insert into contents(title, body, image, id_user) values('$title', '$body', '$fileName', '$idUser')";
        $post = mysqli_query($con, $query);
        // Upload file
        if (! in_array($fileExtension,$fileExtensions)) {
            $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file; ".$_FILES['img_content']['error'];
        }

        if ($fileSize > 2000000) {
            $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB; ".$_FILES['img_content']['error'];
        }

        if ($post) {
            if (empty($errors)) {
                $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
                if ($didUpload) {
                    session_start();
                    $_SESSION['postStore'] = 'Posted!!';
                    header("Location: ../index.php");
                    exit();
                }
                else {
                    $_SESSION['postStore'] = 'Failed to Post!!';
                    header("Location: ../index.php");
                    exit();
                }
            } else {
                foreach ($errors as $error) {
                    echo $error . "These are the errors" . "\n";
                }
            }
            
        }
        else {
            $_SESSION['postStore'] = 'Failed to Post!!';
            header("Location: ../index.php");
            exit();
        }

    }


?>

