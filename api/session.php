<?php

    include 'connection.php';
    $action = $_REQUEST['action'];

    if($action == 'create'){

        $creator = $_REQUEST['creator'];

        mysqli_query($con, "INSERT INTO session (Creator,Turn) VALUES('$creator', '$creator')");
        $id = mysqli_insert_id($con);
        echo $id;

        exit(0);

    }else if($action == 'join'){

        $joiner = $_REQUEST['username'];
        $id = $_REQUEST['id'];

        $result = mysqli_query($con, "SELECT * FROM session WHERE ID=$id");
        $row=mysqli_fetch_assoc($result);

        if($row['Joiner'] == null){

            mysqli_query($con, "UPDATE session SET Joiner = '$joiner' WHERE ID = $id ");
            session_start();

            $_SESSION['id'] = $id;
            $_SESSION['joiner'] = $joiner;
            $_SESSION['creator'] = $row['Creator'];
            echo 'joined';

        }else{
            echo 'used';
        }

        exit(0);


    }else if($action == 'checkJoiner'){

        $id = $_REQUEST['id'];
        $username = $_REQUEST['username'];

        $result = mysqli_query($con, "SELECT Joiner FROM session WHERE ID=$id");
        $row=mysqli_fetch_assoc($result);

        if($row['Joiner'] == null){
            echo 'waiting';
        }else{

            session_start();
            
            $_SESSION['id'] = $id;
            $_SESSION['creator'] = $username;
            $_SESSION['joiner'] = $row['Joiner'];
            
            echo $row['Joiner'];
        }

        exit(0);
    }


?>