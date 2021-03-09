<?php
    $host = 'localhost';
    $dbname = 'zippyusedautos';
    $dsn = "mysql:host={$host};dbname={$dbname}";
    $username = 'root';
    // $password = '';

    try {
        $db = new PDO($dsn, $username);     // without password
        // $db = new PDO($dsn, $username, $password);       // with password
    } catch (PDOException $e) {
        $error_message = 'Database Error: ';
        $error_message .= $e->getMessage();
        include('view/error.php');
        exit();
    }
?>