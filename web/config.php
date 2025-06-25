<?php
    $dbHost = '127.0.0.1:3307';
    $dbUsername = 'root';
    $dbPassword = 'novosql123';
    $dbName = 'tccpetdoador';

        $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

             $conexao->set_charset("utf8mb4");
?>

