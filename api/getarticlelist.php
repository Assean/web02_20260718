<?php
    include_once "db.php";
    header("Content-Type: application/json;charset=utf-8");
    $articles = $pdo->query("SELECT * FROM `articles`")->fetchAll();
    $list = [];
    foreach($articles as $row){
    $list[]=[
            "title" => $row['title'],
            "createdate" => $row['date'],
            "body" => mb_substr($row['content'],0,100,"UTF-8")
        ];
    }
    echo json_encode([
        "success" => true,
        "data" => $list 
    ]);