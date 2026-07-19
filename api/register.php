<?php
    include_once "db.php";
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $check_user = $pdo->query("SELECT * FROM `users` WHERE `username` = '$username'")->fetch();
    if($check_user > 1){
        echo "<script>
        alert('帳戶已存在');
        location.href='../register.php';
        </script>";
        // exit;
        if($password != $password_confirm){
            echo "<script>
            alert('密碼不一致');
            location.href='../register.php';
            </script>";
            exit;
        }
    }else{
        if($password != $password_confirm){
            echo "<script>
            alert('密碼不一致');
            location.href='../register.php';
            </script>";
            exit;
        }else{
            // $_SESSION['user'] = $username;
            $pdo->exec("INSERT INTO `users` (`id`, `username`, `email`, `password`, `img`, `bio`) VALUES (NULL, '$username', '$email', '$password', 'assets/img/profile/default.jpg', '尚未填寫自我介紹');");
            header("location:../login.php");
        }
    }
?>