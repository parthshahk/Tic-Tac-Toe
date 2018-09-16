<?php

    include 'connection.php';
    $action = $_REQUEST['action'];
    session_start();

    if($action == 'gameInfo'){

        $game['username'] = $_SESSION['username'];

        $game['creator'] = $_SESSION['creator'];
        $game['joiner'] = $_SESSION['joiner'];

        $game['id'] = $_SESSION['id'];

        $_SESSION['turn'] = $_SESSION['creator'];
        $game['turn'] = $_SESSION['turn'];



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
        $id = $_SESSION['id'];


        if($type == 'x'){

            $_SESSION['state'][$move] = 'x';
            $_SESSION['turn'] = $_SESSION['joiner'];
            $turn = $_SESSION['turn'];
            mysqli_query($con, "UPDATE session SET Turn='$turn' WHERE ID=$id");

        }else{
            $_SESSION['state'][$move] = 'o';
            $_SESSION['turn'] = $_SESSION['creator'];
            $turn = $_SESSION['turn'];
            mysqli_query($con, "UPDATE session SET Turn='$turn' WHERE ID=$id");
        }

        $gameStates = implode(",",$_SESSION['state']);
        mysqli_query($con, "UPDATE session SET State='$gameStates' WHERE ID=$id");

        exit(0);

    }else if($action == 'gameUpdates'){

        $id = $_SESSION['id'];
        $result = mysqli_query($con, "SELECT Turn,State FROM session WHERE ID=$id");
        $row=mysqli_fetch_assoc($result);

        $_SESSION['turn'] = $row['Turn'];
        $game['turn'] = $_SESSION['turn'];

        $gameStates = explode(",",$row['State']);
        $_SESSION['state'] = $gameStates;
        $game['state'] = $_SESSION['state'];

        echo json_encode($game);
        exit(0);

    }
?>