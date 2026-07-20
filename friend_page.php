<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
</head>
<body>
    <div id="profile-page" class="container py-4">

        <?php
            include_once "inc/header.php";
            
            // 加上 null 合併運算子，防止未帶 GET 參數時噴出 Undefined array key 錯誤
            $send_user = $_GET['send_user'] ?? '';
            $you_user = $_GET['you_user'] ?? '';
            $status = $_GET['status'] ?? '';
            $username = $_GET['username'] ?? '';
            $user = $pdo->query("SELECT * FROM `users` WHERE `username` = '$username'")->fetch();
            $current_user = $_SESSION['user'] ?? '';
        ?>

        <!-- 上方：個人資訊美化區塊 -->
        <div class="card shadow-sm border-0 bg-light p-4 my-4 profile-header">
            <div class="media align-items-center flex-column flex-sm-row text-center text-sm-left">
                <!-- 大頭貼處理：加入圓形與縮圖邊框，固定長寬防變形 -->
                <img src="<?=$user['img'] ?? './assets/default-avatar.svg'?>" alt="Avatar" class="rounded-circle img-thumbnail mb-3 mb-sm-0 mr-sm-4 profile-avatar" style="width: 100px; height: 100px; object-fit: cover;">
                
                <div class="media-body w-100">
                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center">
                        <h2 class="h3 font-weight-bold mb-2 text-dark profile-username"><?=$user['username'] ?? ''?></h2>
                        
                        <!-- 右側/下方好友動作按鈕 -->
                        <div class="profile-friend-actions my-2 my-sm-0">
                            <?php
                            // 精確查詢「當前登入者」與「目前看的目标頁面使用者」之間的關係
                            $b = $pdo->query("SELECT * FROM `friends` WHERE ((`send_user` = '$current_user' AND `you_user` = '$username') OR (`send_user` = '$username' AND `you_user` = '$current_user')) AND `status` = 'friend'")->fetch();
                            $c = $pdo->query("SELECT * FROM `friends` WHERE ((`send_user` = '$current_user' AND `you_user` = '$username') OR (`send_user` = '$username' AND `you_user` = '$current_user')) AND `status` = 'pending'")->fetch();
                            
                            // 如果瀏覽的是自己的頁面，則不顯示好友動作按鈕
                            if($current_user !== $username && !empty($username)){
                                if (!$b && !$c) { 
                                ?>
                                    <button onclick="location.href='./api/friend_add.php?send_user=<?=urlencode($current_user)?>&you_user=<?=urlencode($username)?>'" class="btn btn-primary btn-sm px-4 add_friend">➕ 申請好友</button>
                                <?php } elseif ($b) { ?>
                                    <button onclick="location.href='./api/friend_del.php?send_user=<?=urlencode($b['send_user'])?>&you_user=<?=urlencode($b['you_user'])?>&status=<?=urlencode($b['status'])?>'" class="btn btn-danger btn-sm px-4 add_friend">❌ 移除好友</button>
                                <?php } elseif ($c) { ?>
                                    <button onclick="location.href='./api/friend_del.php?send_user=<?=urlencode($c['send_user'])?>&you_user=<?=urlencode($c['you_user'])?>&status=<?=urlencode($c['status'])?>'" class="btn btn-warning btn-sm px-4 text-dark add_friend">⏳ 移除申請好友</button>
                                <?php } 
                            }
                            ?>
                        </div>
                    </div>
                    <!-- 自我介紹 -->
                    <p class="text-muted mb-0 mt-2 profile-bio"><?=(!empty($user['bio'])) ? htmlspecialchars($user['bio']) : '尚未填寫自我介紹'?></p>
                </div>
            </div>
        </div>

        <!-- 下方：文章列表 -->
        <div class="profile-content">
            <h3 class="h5 border-left border-primary pl-2 mb-4 font-weight-bold text-dark">發布的文章</h3>
            
            <section class="article row">
                <?php
                    $articles = $pdo->query("SELECT * FROM `articles` WHERE `WP` = '$username'")->fetchAll();
                    if(count($articles) < 1){
                    ?>
                        <div class="col-100 w-100 text-center py-5 text-muted empty-article-message">
                            📭 目前尚無文章
                        </div>
                    <?php
                    }else{
                    foreach($articles as $article){
                ?>
                    <!-- 每篇文章使用滿版卡片條列化 -->
                    <div class="col-12 mb-3">
                        <div class="card shadow-sm article-item">
                            <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-md-center py-3">
                                <div>
                                    <h4 class="h6 font-weight-bold text-dark mb-1 article-title">
                                        <?=$article['title']?>
                                    </h4>
                                    <small class="text-muted">
                                        📅 發布日期：<time class="article-date"><?=$article['date']?></time>
                                    </small>
                                </div>
                                <div class="mt-3 mt-md-0">
                                    <a href="./article.php?id=<?=$article['id']?>" class="btn btn-outline-primary btn-sm px-3 article-readmore">閱讀更多</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }} ?>
            </section>
        </div>

    </div>
</body>
</html>