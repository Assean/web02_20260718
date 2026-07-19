<?php
    include_once "db.php";
    $title = $_POST['title'];
    $content = $_POST['content'];
    $pdo->exec("INSERT INTO `articles` (`title`, `content`, `date`,`WP`) VALUES ('$title', '$content', '2026/07/18','{$_SESSION['user']}');");
    $id = $pdo->query("SELECT * FROM `articles` WHERE `id` ORDER BY `id` DESC;")->fetch()[0];
    header("location: ../article.php?id=$id");