<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
</head>
<body>
    <div id="friends-page">
        <?php include_once "inc/header.php"; ?>
        <!-- 搜尋 -->
        <div class="friend-search-section">
            <form action="./api/s_f.php" method="post" class="friend-search-form">
                <input type="text" name="key" class="search-input">
                <button class="search-submit-button">搜尋</button>
            </form>
            <div class="search-result-list">
                <?php
                    $result = $_SESSION['key'] ?? '';
                    foreach($result as $row){
                ?>
                <div class="search-result-item">
                    <div class="result-username"><?=$row['username']?></div>
                    <a href="./friend_page.php?username=<?=$row['username']?>" class="view-profile-link">前往個人頁面</a>
                </div>
                <?php } ?>
            </div>
        </div>
        
        <!-- 好友 -->
        <div class="friend-list-section">
        <div class="section-title h1">好友列表</div>
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
                <div class="friend-item">
                    <img src="<?=$friend_img['img']?>" width="90" height="90" class="friend-avatar">
                    <div class="friend-name">
                        <a href="./friend_page.php?send_user=<?=$friend['send_user']?>&you_user=<?=$friend['you_user']?>&status=<?=$friend['status']?>&username=<?=$you_user?>"><?=$you_user?></a>
                    </div>
                </div>
            <?php } ?>
        </div>
        
        <!-- 我收到 -->
        <div class="incoming-requests-section">
        <div class="section-title h1">收到的好友申請</div>
        <?php
            $requests = $pdo->query("SELECT * FROM `friends` WHERE `you_user` = '{$_SESSION['user']}' AND `status` = 'pending';")->fetchAll();       
            foreach($requests as $roow){
            $requests_img = $pdo->query("SELECT * FROM `users` WHERE `username` = '{$roow['send_user']}'")->fetch();
        ?>
            <div class="request-item">
                <img src="<?=$requests_img['img']?>" width="90" height="90" class="request-avatar">
                <div class="request-username">
                    <a href="./friend_page.php?send_user=<?=$roow['send_user']?>&you_user=<?=$roow['you_user']?>&status=<?=$roow['status']?>&username=<?=$roow['send_user']?>"><?=$roow['send_user']?></a>
                </div>
                <button class="accept-request-button" onclick="location.href='./api/friend_yes.php?send_user=<?=$roow['send_user']?>&you_user=<?=$roow['you_user']?>&status=<?=$roow['status']?>'">接受</button>
                <button class="reject-request-button" onclick="location.href='./api/friend_no.php?send_user=<?=$roow['send_user']?>&you_user=<?=$roow['you_user']?>&status=<?=$roow['status']?>'">拒絕</button>
            </div>
        <?php } ?>
        </div>

        <!-- 我發送 -->
        <div class="sent-requests-section">
        <div class="section-title h1">發送的好友申請</div>
            <div class="request-item">
            <?php
                $requests_2 = $pdo->query("SELECT * FROM `friends` WHERE `send_user` = '{$_SESSION['user']}' AND `status` = 'pending';")->fetchAll();       
                foreach($requests_2 as $rooow){
                $requests_img_2 = $pdo->query("SELECT * FROM `users` WHERE `username` = '{$rooow['send_user']}'")->fetch();
            ?>
                <div class="request-item">
                    <img src="<?=$requests_img_2['img']?>" width="90" height="90" class="request-avatar">
                    <div class="request-username">
                        <a href="./friend_page.php?send_user=<?=$rooow['send_user']?>&you_user=<?=$rooow['you_user']?>&status=<?=$rooow['status']?>&<?=$rooow['you_user']?>&username=<?=$rooow['you_user']?>"><?=$rooow['you_user']?></a>
                    </div>
                    <button class="cancel-request-button" onclick="location.href='./api/friend_no.php?send_user=<?=$rooow['send_user']?>&you_user=<?=$rooow['you_user']?>&status=<?=$rooow['status']?>'">取消</button>
                </div>
            <?php } ?>
            </div>
        </div>


    </div>
</body>
</html>