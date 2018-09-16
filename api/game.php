<?php

    include 'connection.php';
    $action = $_REQUEST['action'];
    session_start();

    if($action == 'gameInfo'){

        $game['username'] = $_SESSION['username'];

        $game['creator'] = $_SESSION['creator'];
        $game['joiner'] = $_SESSION['joiner'];

        $game['id'] = $_SESSION['id'];

        $game['turn'] = $_SESSION['creator'];


        $_SESSION['state'] = array("c","c","c","x","c","c","c","o","c");
        $game['state'] = $_SESSION['state'];


        //Initialize database state
        $gameStates = implode(",",$_SESSION['state']);
        $id = $_SESSION['id'];
        mysqli_query($con, "UPDATE session SET State='$gameStates' WHERE ID=$id");

        echo json_encode($game);
        exit(0);

    }else if($action == 'move'){   
        
        $move = $_REQUEST['move'];
        $type = $_REQUEST['type'];

        if($type == 'x'){
            $_SESSION['state'][$move] = 'x';
        }else{
            $_SESSION['state'][$move] = 'o';
        }

        $gameStates = implode(",",$_SESSION['state']);
        $id = $_SESSION['id'];
        mysqli_query($con, "UPDATE session SET State='$gameStates' WHERE ID=$id");

    }
?>