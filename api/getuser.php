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
    $user = $pdo->query("SELECT * FROM `users` WHERE `id` = '$id'")->fetch();
    if($user < 1){
        echo json_encode([
            "success" => false,
            "data" => "user not found"
        ]);
        exit;    
    }
    $list = [];
    $list[]=[
            "avatar" => $user['img'],
            "username" => $user['username'],
            "bio" => $user['bio']
        ];
    echo json_encode([
        "success" => true,
        "data" => $list 
    ]);