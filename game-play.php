<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
</head>
<body>
    <div id="game-play" class="container py-4">
        <?php 
            include_once "inc/header.php"; 
            $id = $_GET['id'] ?? 1;

            // 用陣列優化原本的 if-else 標題判斷
            $game_titles = [
                1 => "數字挑戰",
                2 => "記憶挑戰",
                3 => "反應力測試",
                4 => "打地鼠",
                5 => "滑動拼圖"
            ];
            $current_title = $game_titles[$id] ?? "未知遊戲";
        ?>

        <!-- 遊戲標題與回上一頁按鈕 -->
        <div class="d-flex justify-content-between align-items-center my-4 pb-2 border-bottom">
            <h2 class="h4 font-weight-bold mb-0 current-game-title"><?= $current_title ?></h2>
            <a href="./games.php" class="btn btn-outline-secondary btn-sm">返回遊戲列表</a>
        </div>
        
        <div class="row">
            <!-- 左側：遊戲遊玩區塊 -->
            <main class="col-lg-8 game-area mb-4">
                <div class="card shadow-sm">
                    <div class="card-body p-2 bg-dark rounded d-flex justify-content-center align-items-center" style="min-height: 520px;">
                        <!-- 限制 iframe 最大寬度並保持居中，移除固定寬高改用樣式控制 -->
                        <iframe src="./assets/games/<?= $id ?>/" frameborder="0" class="game-frame bg-white rounded shadow" style="width: 500px; height: 500px; max-width: 100%;"></iframe>
                    </div>
                </div>
            </main>

            <!-- 右側：排行榜區塊 -->
            <aside class="col-lg-4 game-leaderboard mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-primary text-white font-weight-bold leaderboard-title">
                        🏆 挑戰排行榜
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0 text-center">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col" style="width: 25%">名次</th>
                                        <th scope="col">玩家名稱</th>
                                        <th scope="col" style="width: 30%">分數</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $api_url = "http://localhost/competition/56J17_N/web02_20260718/assets/games/$id/api/pull_score.php";
                                        $scores = json_decode(@file_get_contents($api_url), true);
                                        
                                        if (!empty($scores)) {
                                            $s = 1;
                                            foreach ($scores as $row) {
                                                // 前三名給予不同的顏色標記
                                                $badge_class = 'badge-secondary';
                                                if ($s == 1) $badge_class = 'badge-warning text-dark';
                                                elseif ($s == 2) $badge_class = 'badge-light border';
                                                elseif ($s == 3) $badge_class = 'badge-danger';
                                    ?>
                                    <tr class="leaderboard-item">
                                        <td class="align-middle">
                                            <span class="badge badge-pill <?= $badge_class ?> px-2 py-1">
                                                <?= $s++ ?>
                                            </span>
                                        </td>
                                        <td class="align-middle font-weight-bold"><?= htmlspecialchars($row['玩家名稱']) ?></td>
                                        <td class="align-middle text-primary font-weight-bold"><?= number_format($row['分數']) ?></td>
                                    </tr>
                                    <?php
                                            }
                                        } else {
                                    ?>
                                    <tr>
                                        <td colspan="3" class="text-muted py-4">暫無排行資料，快來搶佔第一名！</td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </aside>
        </div>

    </div>
</body>
</html>