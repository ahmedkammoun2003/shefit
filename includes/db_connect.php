<?php
    $host = 'localhost';
    $db = 'shefit';
    $user = 'chaima';
    $password = 'chaima2002.';
    $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
    try {
        $pdo = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

