<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
</head>
<body>
    <!-- 使用 container 和 row 讓表單在畫面上居中，並加上 padding-top -->
    <div id="login" class="container pt-5">
        <?php include_once "inc/header.php"; ?>
        
        <div class="row justify-content-center mt-4">
            <div class="col-md-6 col-lg-4">
                <!-- 外層包覆卡片提升質感 -->
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title text-center mb-4">會員登入</h4>
                        
                        <form action="./api/login.php" method="post" class="login-form">
                            <!-- 帳號區塊 -->
                            <div class="form-group">
                                <label for="username">帳號</label>
                                <input type="text" name="username" id="username" class="form-control username-input" placeholder="請輸入帳號">
                            </div>
                            
                            <!-- 密碼區塊 -->
                            <div class="form-group mb-4">
                                <label for="password">密碼</label>
                                <input type="password" name="password" id="password" class="form-control password-input" placeholder="請輸入密碼">
                            </div>
                            
                            <!-- 區塊按鈕 -->
                            <button type="submit" class="btn btn-primary btn-block login-submit-button">送出</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>