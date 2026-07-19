<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
</head>
<body>
    <div id="admin">
        <?php include_once "inc/header.php"; ?>
        <!-- 修正：移除 admin.php 後方多餘的逗號 -->
        <a class="border p-2 m-1" href="./admin.php">基本設定</a>
        <a class="border p-2 m-1" href="./admin_result.php">問卷回應</a>
        <a class="border p-2 m-1" href="./admin_imgtable.php">統計圖表</a>
        <a class="border p-2 m-1" href="./form.php">瀏覽表單</a>

        <h1>統計圖表</h1>
        <?php
            $good_row = $pdo->query("SELECT COUNT(id) as good FROM form_result WHERE good_or_nono = '好'")->fetch();
            $good = $good_row['good'] ?? 0;
            
            $nono_row = $pdo->query("SELECT COUNT(id) as nono FROM form_result WHERE good_or_nono = '不好'")->fetch();
            $nono = $nono_row['nono'] ?? 0;
            
            $tall = $good + $nono;

            // 修正：先判斷總數是否大於 0，避免 Division by zero 錯誤，並修正百分比計算公式
            if ($tall > 0) {
                $good_p = ($good / $tall) * 100;
                $nono_p = ($nono / $tall) * 100;
            } else {
                $good_p = 0;
                $nono_p = 0;
            }
        ?>
    </div>
</body>
</html>