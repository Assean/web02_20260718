<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
</head>
<body>
    <div id="admin" class="container my-4">
        <?php include_once "inc/header.php"; ?>
        
        <!-- 上方功能導覽標籤 -->
        <nav class="nav nav-pills my-4">
            <a class="nav-link border m-1 text-secondary" href="./admin.php">基本設定</a>
            <a class="nav-link border m-1 text-secondary" href="./admin_result.php">問卷回應</a>
            <a class="nav-link active m-1 bg-info text-white" href="./admin_imgtable.php">統計圖表</a>
            <a class="nav-link border m-1 text-secondary" href="./form.php">瀏覽表單</a>
        </nav>

        <h1>統計圖表</h1>
        
        <?php
            $good_row = $pdo->query("SELECT COUNT(id) as good FROM form_result WHERE good_or_nono = '好'")->fetch();
            $good = $good_row['good'] ?? 0;
            
            $nono_row = $pdo->query("SELECT COUNT(id) as nono FROM form_result WHERE good_or_nono = '不好'")->fetch();
            $nono = $nono_row['nono'] ?? 0;
            
            $tall = $good + $nono;

            if ($tall > 0) {
                $good_p = ($good / $tall) * 100;
                $nono_p = ($nono / $tall) * 100;
            } else {
                $good_p = 0;
                $nono_p = 0;
            }
        ?>

        <!-- 陽春版圖表 -->
        <div class="my-3">
            <p>總回應次數：<?=$tall?></p>
            
            <!-- 好 -->
            <div class="mb-3">
                <div>好 (<?=$good?>)</div>
                <div class="progress">
                    <div class="progress-bar bg-success" style="width: <?=$good_p?>%"><?=round($good_p)?>%</div>
                </div>
            </div>

            <!-- 不好 -->
            <div class="mb-3">
                <div>不好 (<?=$nono?>)</div>
                <div class="progress">
                    <div class="progress-bar bg-danger" style="width: <?=$nono_p?>%"><?=round($nono_p)?>%</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>