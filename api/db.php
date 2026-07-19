<?php
    $dsn = "mysql:host=localhost;charset=utf8;dbname=web02_db";
    $pdo = new PDO($dsn,'web02','1234');
    date_default_timezone_set("Asia/Taipei");
    session_start();