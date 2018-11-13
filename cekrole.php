<?php
    include 'con.php';
    
    function cekrole($username) {
        // echo $username;
        $data_user = mysqli_query($con, "select * from users where username='$username'");
        $data = mysqli_fetch_array($data_user);
        echo $data['username'];
        if (mysqli_num_rows($data_user) == 0) {
            return "Data gada bruhhhh";
            echo $data['role'];
        } else {
            echo $data['role'];
            return $data['role'];
        }
    }
    function getRole($username)
    {
        include 'con.php';
        $query = mysqli_query($con,"SELECT *FROM users where username='$username' ");
        $r = mysqli_fetch_array($query);
        echo $r['role'];
    }
    getRole('lori');
    