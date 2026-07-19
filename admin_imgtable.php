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
        <a class="border p-2 m-1" href="./admin">基本設定</a>
        <a class="border p-2 m-1" href="./admin_result.php">問卷回應</a>
        <a class="border p-2 m-1" href="./admin_imgtable.php">統計圖表</a>
        <a class="border p-2 m-1" href="./form.php">瀏覽表單</a>

        <h1>統計圖表</h1>
        <?php
            $good_row = $pdo->query("SELECT COUNT(id) as good FROM form_result WHERE good_or_nono = '好'")->fetch();
            $good = $good_row['good'];
        ?>
    </div>
</body>
</html>