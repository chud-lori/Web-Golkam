<?php
    include 'con.php';
    
    function cekrole($username) {
        $data_user = mysqli_query($con, "select * from users where username='$username'");
        $data = mysqli_fetch_array($data_user);
        if (mysqli_num_rows($data_user) == 0) {
            return "Data gada";
            echo $data['role'];
        } else {
            echo $data['role'];
            return $data['role'];
        }
    }