<?php
    include_once "db.php";
    header("Content-Type: application/json;charset=utf-8");
    $id = $_GET['id'] ?? '';
    if($id == ''){
        echo json_encode([
            "success" => false,
            "data" => "request query params not found"
        ]);
        exit;    
    }
    $article = $pdo->query("SELECT * FROM `articles` WHERE `id` = '$id'")->fetch();
    if($article < 1){
        echo json_encode([
            "success" => false,
            "data" => "article not found"
        ]);
        exit;    
    }
    $list = [];
    $list[]=[
            "title" => $article['title'],
            "createdate" => $article['date'],
            "body" => $article['content']
        ];
    echo json_encode([
        "success" => true,
        "data" => $list 
    ]);