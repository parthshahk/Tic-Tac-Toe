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
        
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];

        $result = mysqli_query($con, "SELECT * FROM users WHERE Username='$username' AND Password='$password'");

        if(mysqli_num_rows($result)){

            session_start();
            $_SESSION['loggedIn'] = true;
            $_SESSION['username'] = $username;
            echo 'success';
            exit(0);

        }else{
            echo 'invalid';
            exit(0);
        }

    }else if($action == 'logout'){

        session_start();
        session_destroy();
        exit(0);

    }else if($action == 'status'){

        session_start();

        if(isset($_SESSION['loggedIn'])){
            if($_SESSION['loggedIn'] == true){

                echo $_SESSION['username'];
                exit(0);

            }
        }

        echo 'false';
        exit(0);

    }




?>