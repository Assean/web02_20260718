<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
</head>
<body>
    <div id="games">
        <?php include_once "inc/header.php"; ?>
        <section class="game-list">
            <div class="game-item">
                <img src="./assets/games/1/cover.svg" alt="" class="game-cover">
                <div class="game-title">數字挑戰</div>
                <div class="game-description">依序點擊數字，按升序完成挑戰！</div>
                <a href="./game-play.php?id=1" class="play-game-link">開始遊戲</a>
            </div>
            <div class="game-item">
                <img src="./assets/games/2/cover.svg" alt="" class="game-cover">
                <div class="game-title">記憶挑戰</div>
                <div class="game-description">依序點擊數字，按升序完成挑戰！</div>
                <a href="./game-play.php?id=2" class="play-game-link">開始遊戲</a>
            </div>
            <div class="game-item">
                <img src="./assets/games/3/cover.svg" alt="" class="game-cover">
                <div class="game-title">反應力測試</div>
                <div class="game-description">畫面變綠立即點擊・測試平均反應時間</div>
                <a href="./game-play.php?id=3" class="play-game-link">開始遊戲</a>
            </div>
            <div class="game-item">
                <img src="./assets/games/4/cover.svg" alt="" class="game-cover">
                <div class="game-title">打地鼠</div>
                <div class="game-description">30 秒內打越多地鼠分數越高！錯過 3 隻就扣分哦</div>
                <a href="./game-play.php?id=4" class="play-game-link">開始遊戲</a>
            </div>
            <div class="game-item">
                <img src="./assets/games/5/cover.svg" alt="" class="game-cover">
                <div class="game-title">滑動拼圖</div>
                <div class="game-description">點擊可移動的方塊，讓數字1～8 按順序排列</div>
                <a href="./game-play.php?id=5" class="play-game-link">開始遊戲</a>
            </div>
        </section>
    </div>
</body>
</html>