<?php

    include 'connection.php';
    $action = $_REQUEST['action'];
    session_start();

    if($action == 'gameInfo'){

        $game['username'] = $_SESSION['username'];
        $game['creator'] = $_SESSION['creator'];
        $game['joiner'] = $_SESSION['joiner'];
        $game['id'] = $_SESSION['id'];

        echo json_encode($game);
        exit(0);

    }
?>