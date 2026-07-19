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
        <form action="./api/login.php" method="post" class="login-form">
            <div>
                <label for="username">帳號</label>
                <input type="text" name="username" class="username-input">
            </div>
            <div>
                <label for="password">密碼</label>
                <input type="password" name="password" class="password-input">
            </div>
            <button class="login-submit-button">送出</button>
        </form>
    </div>
</body>
</html>