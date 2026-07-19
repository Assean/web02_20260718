<?php
    include_once "db.php";
    $username = $_POST['username'];
    // $email = $_POST['email'];
    $password = $_POST['password'];
    // $password_confirm = $_POST['password_confirm'];
    $check_user = $pdo->query("SELECT * FROM `users` WHERE `username` = '$username'")->fetch();
    $check_pass = $pdo->query("SELECT * FROM `users` WHERE `password` = '$password'")->fetch();
    
    if($check_user > 1){
        if($check_pass > 1){
            $_SESSION['user'] = $username;
            echo "<script>
            location.href='../profile.php';
            </script>";
            exit;   
        }else{
            echo "<script>
            alert('帳號密碼錯誤');
            location.href='../login.php';
            </script>";
            exit;
        }
    }else{
        echo "<script>
            alert('帳號密碼錯誤');
            location.href='../login.php';
            </script>";
            exit;
    }