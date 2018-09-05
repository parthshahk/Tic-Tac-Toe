<?php
    if($_SERVER['SERVER_NAME'] == 'parthshah.xyz'){

        // $host =  'localhost';
        // $user = 'malgamc9_parth';
        // $password = 'RPrQ5J&Mh!v4';
        // $dbname = 'malgamc9_electronics2';

    }else{

        $host =  'localhost';
        $user = 'parth';
        $password = 'parth';
        $dbname = 'test';

    }

    $dsn = 'mysql:host='. $host .';dbname='. $dbname;

    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
?>