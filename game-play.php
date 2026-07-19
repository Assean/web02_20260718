<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
</head>
<body>
    <div id="game-play">
        <?php
            include_once "inc/header.php";
            $id = $_GET['id'];
            if($id == 1){
        ?>
        <div class="current-game-title">數字挑戰</div>
        <?php }elseif($id == 2){ ?>
        <div class="current-game-title">記憶挑戰</div>
        <?php }elseif($id == 3){ ?>
        <div class="current-game-title">反應力測試</div>
        <?php }elseif($id == 4){ ?>
        <div class="current-game-title">打地鼠</div>
        <?php }elseif($id == 5){ ?>
        <div class="current-game-title">滑動拼圖</div>
        <?php } ?>
        
        <section class="game-area">
            <iframe src="./assets/games/<?=$id?>/" width="500" height="500" frameborder="0" class="game-frame"></iframe>
        </section>

        <aside class="game-leaderboard">
            <div class="leaderboard-title">排行榜</div>
            <?php
                $api_url = "http://localhost/02/assets/games/$id/api/pull_score.php";
                $scores = json_decode(@file_get_contents($api_url),true);
                $s=1;   ;foreach($scores as $row){
                
            ?>
            <div class="leaderboard-item">
                <div class="player-rank">
                    名次: <?= $s++ ?>
                    玩家名稱: <?= $row['玩家名稱'] ?>
                    分數: <?= $row['分數'] ?>
                </div>
            </div>
            <?php
                }
            ?>
        </aside>

    </div>
</body>
</html>