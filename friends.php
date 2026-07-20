<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
    <!-- 引入 Bootstrap 5 CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <style>
        /* 讓大頭貼保持正方形且不變形 */
        .avatar-img {
            object-fit: cover;
        }
    </style>
</head>
<body class="bg-light">
    <?php include_once "inc/header.php";
            if(!isset($_SESSION['user']))exit(header("location:./login.php"));
    ?>

    <div class="container my-5" id="friends-page">
        
        <!-- 搜尋區塊 -->
        <div class="row justify-content-center mb-5">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form action="./api/s_f.php" method="post" class="d-flex gap-2">
                            <input type="text" name="key" class="form-control" placeholder="搜尋好友...">
                            <button class="btn btn-primary text-nowrap">搜尋</button>
                        </form>
                        
                        <!-- 搜尋結果 -->
                        <div class="mt-3">
                            <?php
                                $result = $_SESSION['key'] ?? [];
                                foreach($result as $row){
                            ?>
                            <div class="d-flex justify-content-between align-items-center p-2 border-bottom">
                                <div class="fw-bold text-dark"><?=$row['username']?></div>
                                <a href="./friend_page.php?username=<?=$row['username']?>" class="btn btn-sm btn-outline-secondary">前往個人頁面</a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 主內容區：分成三欄佈局 -->
        <div class="row g-4">
            
            <!-- 1. 好友列表 -->
            <div class="col-md-4">
                <div class="h4 mb-3 border-start border-primary border-4 ps-2 fw-bold">好友列表</div>
                <div class="d-flex flex-column gap-2">
                    <?php
                        $friends = $pdo->query("SELECT * FROM `friends` WHERE (`send_user` = '{$_SESSION['user']}' OR `you_user` = '{$_SESSION['user']}') AND `status` = 'friend'")->fetchAll();
                        foreach($friends as $friend){
                            if($friend['send_user'] == $_SESSION['user']){
                                $you_user = $friend['you_user'];
                            }else{
                                $you_user = $friend['send_user'];
                            }
                            $friend_img = $pdo->query("SELECT * FROM `users` WHERE `username` = '$you_user'")->fetch();
                    ?>
                        <div class="card shadow-sm hstack gap-3 p-2" style="cursor: pointer;" onclick="location.href='./friend_page.php?send_user=<?=$friend['send_user']?>&you_user=<?=$friend['you_user']?>&status=<?=$friend['status']?>&username=<?=$you_user?>'">
                            <img src="<?=$friend_img['img']?>" width="60" height="60" class="rounded-circle avatar-img bg-secondary-subtle">
                            <div class="friend-name fw-bold m-0">
                                <a href="./friend_page.php?send_user=<?=$friend['send_user']?>&you_user=<?=$friend['you_user']?>&status=<?=$friend['status']?>&username=<?=$you_user?>" class="text-decoration-none text-dark"><?=$you_user?></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <!-- 2. 我收到 -->
            <div class="col-md-4">
                <div class="h4 mb-3 border-start border-success border-4 ps-2 fw-bold">收到的好友申請</div>
                <div class="d-flex flex-column gap-2">
                    <?php
                        $requests = $pdo->query("SELECT * FROM `friends` WHERE `you_user` = '{$_SESSION['user']}' AND `status` = 'pending';")->fetchAll();       
                        foreach($requests as $roow){
                            $requests_img = $pdo->query("SELECT * FROM `users` WHERE `username` = '{$roow['send_user']}'")->fetch();
                    ?>
                        <div class="card shadow-sm p-3">
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <img src="<?=$requests_img['img']?>" width="60" height="60" class="rounded-circle avatar-img bg-secondary-subtle">
                                <div class="fw-bold">
                                    <a href="./friend_page.php?send_user=<?=$roow['send_user']?>&you_user=<?=$roow['you_user']?>&status=<?=$roow['status']?>&username=<?=$roow['send_user']?>" class="text-decoration-none text-dark"><?=$roow['send_user']?></a>
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <button class="btn btn-sm btn-success w-50" onclick="location.href='./api/friend_yes.php?send_user=<?=$roow['send_user']?>&you_user=<?=$roow['you_user']?>&status=<?=$roow['status']?>'">接受</button>
                                <button class="btn btn-sm btn-outline-danger w-50" onclick="location.href='./api/friend_no.php?send_user=<?=$roow['send_user']?>&you_user=<?=$roow['you_user']?>&status=<?=$roow['status']?>'">拒絕</button>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <!-- 3. 我發送 -->
            <div class="col-md-4">
                <div class="h4 mb-3 border-start border-warning border-4 ps-2 fw-bold">發送的好友申請</div>
                <div class="d-flex flex-column gap-2">
                    <?php
                        $requests_2 = $pdo->query("SELECT * FROM `friends` WHERE `send_user` = '{$_SESSION['user']}' AND `status` = 'pending';")->fetchAll();       
                        foreach($requests_2 as $rooow){
                            $requests_img_2 = $pdo->query("SELECT * FROM `users` WHERE `username` = '{$rooow['send_user']}'")->fetch(); // 註：此處維持你原本的邏輯
                    ?>
                        <div class="card shadow-sm p-3">
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <img src="<?=$requests_img_2['img']?>" width="60" height="60" class="rounded-circle avatar-img bg-secondary-subtle">
                                <div class="fw-bold">
                                    <a href="./friend_page.php?send_user=<?=$rooow['send_user']?>&you_user=<?=$rooow['you_user']?>&status=<?=$rooow['status']?>&<?=$rooow['you_user']?>&username=<?=$rooow['you_user']?>" class="text-decoration-none text-dark"><?=$rooow['you_user']?></a>
                                </div>
                            </div>
                            <button class="btn btn-sm btn-secondary w-100" onclick="location.href='./api/friend_no.php?send_user=<?=$rooow['send_user']?>&you_user=<?=$rooow['you_user']?>&status=<?=$rooow['status']?>'">取消申請</button>
                        </div>
                    <?php } ?>
                </div>
            </div>

        </div>
    </div>

    <!-- 引入 Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>