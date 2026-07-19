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
            <a class="nav-link border m-1" href="./admin.php">基本設定</a>
            <a class="nav-link active m-1 bg-info text-white" href="./admin_result.php">問卷回應</a>
            <a class="nav-link border m-1" href="./admin_imgtable.php">統計圖表</a>
            <a class="nav-link border m-1" href="./form.php">瀏覽表單</a>
        </nav>

        <h1 class="h3 mb-4 text-secondary border-bottom pb-2">問卷回應</h1>
        
        <!-- 問卷回應資料表格 -->
        <div class="table-responsive shadow-sm rounded">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th scope="col" class="py-3">姓名</th>
                        <th scope="col" class="py-3">Email</th>
                        <th scope="col" class="py-3">遊戲</th>
                        <th scope="col" class="py-3">評價</th>
                        <th scope="col" class="py-3">意見回饋</th>
                        <th scope="col" class="py-3 text-center">操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $a = $pdo->query("SELECT * FROM `form_result`")->fetchAll();
                    foreach($a as $b){ ?>
                        <tr>
                            <td><?=$b['name']?></td>
                            <td><?=$b['email']?></td>
                            <td><span class="badge bg-light text-dark border"><?=$b['game']?></span></td>
                            <td><?=$b['good_or_nono']?></td>
                            <td class="text-muted"><?=$b['good_text']?></td>
                            <td class="text-center">
                                <a class="btn btn-outline-danger btn-sm" href="./api/del.php?id=<?=$b['id']?>">刪除</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>