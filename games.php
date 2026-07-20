<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
</head>
<body>
    <div id="games" class="container py-5">
        <?php include_once "inc/header.php"; ?>
        
        <!-- 使用 row 搭配 row-cols 讓排版在不同螢幕尺寸下自動調整 -->
        <!-- sm: 1列2個, md: 1列3個, lg: 1列4個 -->
        <section class="game-list row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 mt-4">
            
            <!-- 遊戲項目 1 -->
            <div class="col mb-4">
                <div class="card h-100 shadow-sm game-item">
                    <img src="./assets/games/1/cover.svg" alt="數字挑戰" class="card-img-top game-cover" style="object-fit: cover; height: 180px;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title font-weight-bold game-title">數字挑戰</h5>
                        <p class="card-text text-muted small flex-grow-1 game-description">依序點擊數字，按升序完成挑戰！</p>
                        <a href="./game-play.php?id=1" class="btn btn-primary btn-block mt-3 play-game-link">開始遊戲</a>
                    </div>
                </div>
            </div>

            <!-- 遊戲項目 2 -->
            <div class="col mb-4">
                <div class="card h-100 shadow-sm game-item">
                    <img src="./assets/games/2/cover.svg" alt="記憶挑戰" class="card-img-top game-cover" style="object-fit: cover; height: 180px;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title font-weight-bold game-title">記憶挑戰</h5>
                        <p class="card-text text-muted small flex-grow-1 game-description">依序點擊數字，按升序完成挑戰！</p>
                        <a href="./game-play.php?id=2" class="btn btn-primary btn-block mt-3 play-game-link">開始遊戲</a>
                    </div>
                </div>
            </div>

            <!-- 遊戲項目 3 -->
            <div class="col mb-4">
                <div class="card h-100 shadow-sm game-item">
                    <img src="./assets/games/3/cover.svg" alt="反應力測試" class="card-img-top game-cover" style="object-fit: cover; height: 180px;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title font-weight-bold game-title">反應力測試</h5>
                        <p class="card-text text-muted small flex-grow-1 game-description">畫面變綠立即點擊・測試平均反應時間</p>
                        <a href="./game-play.php?id=3" class="btn btn-primary btn-block mt-3 play-game-link">開始遊戲</a>
                    </div>
                </div>
            </div>

            <!-- 遊戲項目 4 -->
            <div class="col mb-4">
                <div class="card h-100 shadow-sm game-item">
                    <img src="./assets/games/4/cover.svg" alt="打地鼠" class="card-img-top game-cover" style="object-fit: cover; height: 180px;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title font-weight-bold game-title">打地鼠</h5>
                        <p class="card-text text-muted small flex-grow-1 game-description">30 秒內打越多地鼠分數越高！錯過 3 隻就扣分哦</p>
                        <a href="./game-play.php?id=4" class="btn btn-primary btn-block mt-3 play-game-link">開始遊戲</a>
                    </div>
                </div>
            </div>

            <!-- 遊戲項目 5 -->
            <div class="col mb-4">
                <div class="card h-100 shadow-sm game-item">
                    <img src="./assets/games/5/cover.svg" alt="滑動拼圖" class="card-img-top game-cover" style="object-fit: cover; height: 180px;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title font-weight-bold game-title">滑動拼圖</h5>
                        <p class="card-text text-muted small flex-grow-1 game-description">點擊可移動的方塊，讓數字1～8 按順序排列</p>
                        <a href="./game-play.php?id=5" class="btn btn-primary btn-block mt-3 play-game-link">開始遊戲</a>
                    </div>
                </div>
            </div>

        </section>
    </div>
</body>
</html> 