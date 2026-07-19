<?php
    include_once "db.php";
    $send_user = $_GET['send_user'];
    $you_user = $_GET['you_user'];
    $status = $_GET['status'];
    $pdo->exec("DELETE FROM `friends` WHERE `friends`.`send_user` = '$send_user' AND `you_user` = '$you_user'");
    header("location:../friends.php");