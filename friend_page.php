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
            $send_user = $_GET['send_user'] ?? '';
            $you_user = $_GET['you_user'] ?? '';
            $status = $_GET['status'] ?? '';
            $username = $_GET['username'];
            $user = $pdo->query("SELECT * FROM `users` WHERE `username` = '$username'")->fetch();
        ?>

        
        <div class="profile-header">
            <div class="profile-username"><?=$user['username']?></div>
            <img src="<?=$user['img']?>" alt="" class="profile-avatar">
            <div class="profile-bio"><?=$user['bio']?></div>
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
                <!-- 尚未 -->
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
            $a = $pdo->query("SELECT * FROM `friends` WHERE `send_user` = '$username' OR `you_user` = '$username'")->fetch();
            $b = $pdo->query("SELECT * FROM `friends` WHERE (`send_user` = '$username' OR `you_user` = '$username') AND `status` = 'friend' ")->fetch();
            $c = $pdo->query("SELECT * FROM `friends` WHERE (`send_user` = '$username' OR `you_user` = '$username') AND `status` = 'pending' ")->fetch();
            if($a < 1){
            ?>
                <button onclick="location.href='./api/friend_add.php?send_user=<?=$_SESSION['user']?>&you_user=<?=$user['username']?>'" class="add_friend">申請好友</button>
            <?php }elseif($b > 1){ ?>
                <button onclick="location.href='./api/friend_del.php?send_user=<?=$b['send_user']?>&you_user=<?=$b['you_user']?>&status=<?=$b['status']?>'" class="add_friend">移除好友</button>
            <?php }elseif($c > 1){ ?>
                <button onclick="location.href='./api/friend_del.php?send_user=<?=$c['send_user']?>&you_user=<?=$c['you_user']?>&status=<?=$c['status']?>'" class="add_friend">移除申請好友</button>
            <?php } ?>
        </div>

    </div>
</body>
</html>