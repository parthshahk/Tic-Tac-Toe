<?php
    include 'connection.php';
    $action = $_REQUEST['action'];


    if($action == 'validateUniqueUsername'){

        $username = $_REQUEST['username'];

        $result = mysqli_query($con, "SELECT * FROM users WHERE Username='$username'");

        if(mysqli_num_rows($result)){
            echo 'exists';
            exit(0);
        }else{
            echo 'available';
            exit(0);
        }

    }else if($action == 'signup'){

        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];

        mysqli_query($con, "INSERT INTO users VALUES('$username', '$password')");

        echo 'created';
        exit(0);

    }else if($action == 'login'){
        
        

    }




?>