<?php
    include './includes/config.php';

    $p1Name = $_GET['q'];

    $boardJson = '["closed","closed","closed","closed","closed","closed","closed","closed","closed"]';

    $gameJson = '["'.$p1Name.'", ""]';

    $statement = $pdo->prepare("INSERT INTO sessions(Board, Game, `Last Update`) VALUES('$boardJson', '$gameJson', 'p1')");
    $row = $statement->execute();

    $lastId = $pdo->lastInsertId();

    header("Location: play.php?id=$lastId&type=creator");  

?>