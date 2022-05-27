<?php
    // Development Connection
    // $host = 'localhost'; // 127.0.0.1
    // $db = 'attendance_db';
    // $user = 'root';
    // $pass = '';
    // $charset = 'utf8mb4';

    // Remote Database Conncection
    $host = 'sql6.freesqldatabase.com'; // 127.0.0.1
    $db = 'sql6495616';
    $user = 'sql6495616';
    $pass = 'y94PZy5Xrh';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try{
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Hi, it's a success";
        //print_r(PDO::getAvailableDrivers());
    } catch (PDoException $e){
        //echo "Oops! something wrong.";
        throw new PDOException($e->getMessage());
    }

    require_once 'crud.php';
    $crud = new crud($pdo);
?>