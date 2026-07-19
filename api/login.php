<?php
    // 必須在檔案最上方啟用 Session
    session_start(); 
    include_once "db.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    // 將帳號與密碼放在同一個 SQL 中查詢，效率更好也更符合登入邏輯
    $user = $pdo->query("SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'")->fetch();

    // 直接判斷是否成功取得資料 (若有資料，$user 會是陣列，等同於 true)
    if($user){
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
?>