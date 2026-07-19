<?php
    include_once "db.php";
    $key = $_POST['key'];
    $result = $pdo->query("SELECT * FROM `users` WHERE `username` LIKE '%$key%'")->fetchAll();
    print_r($result);
    $_SESSION['key'] = $result;
    header("location:../friends.php");