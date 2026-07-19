<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
</head>
<body>
    <div id="login">
        <?php include_once "inc/header.php"; ?>
        <form action="./api/register.php" method="post" class="register-form">
            <div>
                <label for="username">帳號</label>
                <input type="text" name="username" class="username-input">
            </div>
            <div>
                <label for="email">電子郵件</label>
                <input type="email" name="email" class="email-input">
            </div>
            <div>
                <label for="password">密碼</label>
                <input type="password" name="password" class="password-input">
            </div>
            <div>
                <label for="password">確認密碼</label>
                <input type="password" name="password_confirm" class="password-confirm-input">
            </div>
            <button class="register-submit">送出</button>
        </form>
    </div>
</body>
</html>