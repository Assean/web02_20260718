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
            <div class="col-md-6 col-lg-5">
                <!-- 外層包覆卡片提升質感 -->
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title text-center mb-4">會員註冊</h4>
                        
                        <form action="./api/register.php" method="post" class="register-form">
                            <!-- 帳號區塊 -->
                            <div class="form-group">
                                <label for="username">帳號</label>
                                <input type="text" name="username" id="username" class="form-control username-input" placeholder="請輸入帳號">
                            </div>

                            <!-- 電子郵件區塊 -->
                            <div class="form-group">
                                <label for="email">電子郵件</label>
                                <input type="email" name="email" id="email" class="form-control email-input" placeholder="example@email.com">
                            </div>
                            
                            <!-- 密碼區塊 -->
                            <div class="form-group">
                                <label for="password">密碼</label>
                                <input type="password" name="password" id="password" class="form-control password-input" placeholder="請輸入密碼">
                            </div>

                            <!-- 確認密碼區塊 -->
                            <div class="form-group mb-4">
                                <label for="password_confirm">確認密碼</label>
                                <input type="password" name="password_confirm" id="password_confirm" class="form-control password-confirm-input" placeholder="請再次輸入密碼">
                            </div>
                            
                            <!-- 區塊按鈕（註冊改用綠色按鈕區隔） -->
                            <button type="submit" class="btn btn-success btn-block register-submit">送出</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>