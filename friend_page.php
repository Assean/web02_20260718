<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
</head>
<body>
    <div id="profile-page">

        <?php
            include_once "inc/header.php";
            
            // 【Bug 1 修正】加上 null 合併運算子，防止未帶 GET 參數時噴出 Undefined array key 錯誤
            $send_user = $_GET['send_user'] ?? '';
            $you_user = $_GET['you_user'] ?? '';
            $status = $_GET['status'] ?? '';
            $username = $_GET['username'] ?? '';
            
            // 撈取目標使用者資料
            $user = $pdo->query("SELECT * FROM `users` WHERE `username` = '$username'")->fetch();
            
            // 取得當前登入使用者（確保 session 存在）
            $current_user = $_SESSION['user'] ?? '';
        ?>

        <div class="profile-header">
            <!-- 依需求已移除所有 htmlspecialchars，並使用 ?? 防止變數為空時拋出 Notice 錯誤 -->
            <div class="profile-username"><?=$user['username'] ?? ''?></div>
            <img src="<?=$user['img'] ?? ''?>" alt="" class="profile-avatar">
            <div class="profile-bio"><?=$user['bio'] ?? ''?></div>
        </div>

        <div class="profile-content">
            <section class="article">
                <?php
                    $articles = $pdo->query("SELECT * FROM `articles` WHERE `WP` = '$username'")->fetchAll();
                    if(count($articles) < 1){
                    ?>
                    <div class="empty-article-message">目前尚無文章</div>
                <?php
                    }else{
                    foreach($articles as $article){
                ?>
                    <div class="article-item border m-2 p-2">
                        <div class="article-title">文章標題:<?=$article['title']?></div>
                        <time class="article-date">發布日期:<?=$article['date']?></time>
                        <a href="./article.php?id=<?=$article['id']?>" class="article-readmore">閱讀更多</a>
                    </div>
                <?php }} ?>
            </section>
        </div>

        <div class="profile-friend-actions">
            <?php
            // 【Bug 2 & 3 修正】精確查詢「當前登入者」與「目前看的目标頁面使用者」之間的關係，避免撈出他人好友紀錄
            $b = $pdo->query("SELECT * FROM `friends` WHERE ((`send_user` = '$current_user' AND `you_user` = '$username') OR (`send_user` = '$username' AND `you_user` = '$current_user')) AND `status` = 'friend'")->fetch();
            $c = $pdo->query("SELECT * FROM `friends` WHERE ((`send_user` = '$current_user' AND `you_user` = '$username') OR (`send_user` = '$username' AND `you_user` = '$current_user')) AND `status` = 'pending'")->fetch();
            
            // 如果瀏覽的是自己的頁面，則不顯示好友動作按鈕
            if($current_user !== $username){
                // 【Bug 2 修正】將不正確的陣列數字比較（$b > 1），修改為正確的布林值與隱式轉換判斷
                if (!$b && !$c) { 
                ?>
                    <button onclick="location.href='./api/friend_add.php?send_user=<?=urlencode($current_user)?>&you_user=<?=urlencode($username)?>'" class="add_friend">申請好友</button>
                <?php } elseif ($b) { ?>
                    <button onclick="location.href='./api/friend_del.php?send_user=<?=urlencode($b['send_user'])?>&you_user=<?=urlencode($b['you_user'])?>&status=<?=urlencode($b['status'])?>'" class="add_friend">移除好友</button>
                <?php } elseif ($c) { ?>
                    <button onclick="location.href='./api/friend_del.php?send_user=<?=urlencode($c['send_user'])?>&you_user=<?=urlencode($c['you_user'])?>&status=<?=urlencode($c['status'])?>'" class="add_friend">移除申請好友</button>
                <?php } 
            }
            ?>
        </div>

    </div>
</body>
</html>