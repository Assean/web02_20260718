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
        <a class="border p-2 m-1" href="./admin.php">基本設定</a>
        <a class="border p-2 m-1" href="./admin_result.php">問卷回應</a>
        <a class="border p-2 m-1" href="./admin_imgtable.php">統計圖表</a>
        <a class="border p-2 m-1" href="./form.php">瀏覽表單</a>

        <h1>問卷回應</h1>
        
        <?php
        $a = $pdo->query("SELECT * FROM `form_result`")->fetchAll();
        foreach($a as $b){ ?>
            <?=$b['name']?> 
            <?=$b['email']?> 
            <?=$b['game']?> 
            <?=$b['good_or_nono']?> 
            <?=$b['good_text']?>
            <a href="./api/del.php?id=<?=$b['id']?>">刪除</a>
            <br>
        <?php } ?>
    </div>
</body>
</html>