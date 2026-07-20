<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
</head>
<body>
    <div id="article" class="container py-5">
        <?php 
            include_once "inc/header.php";
            $id = $_GET['id'] ?? '';
            $article = $pdo->query("SELECT * FROM `articles` WHERE `id` = '$id'")->fetch();        
        ?>

        <div class="row justify-content-center">
            <div class="col-lg-9">

                <!-- 文章主體容器 -->
                <article class="card shadow-sm border-0 p-4 p-md-5">
                    
                    <!-- 文章頭部資訊 -->
                    <header class="article-header border-bottom pb-4 mb-4">
                        <h1 class="display-5 font-weight-bold text-dark mb-3 article-title">
                            <?= $article['title'] ?? '未命名文章' ?>
                        </h1>
                        <div class="text-muted small">
                            發布日期：<time class="article-date"><?= $article['date'] ?? '' ?></time>
                            <span class="mx-2">•</span>
                            作者：<?= $article['WP'] ?? '匿名' ?>
                        </div>
                    </header>

                    <!-- 文章內容區塊（已移除 htmlspecialchars，允許解析 HTML 標籤） -->
                    <section class="article-body lh-lg text-secondary" style="font-size: 1.1rem; line-height: 1.8;">
                        <?= nl2br($article['content'] ?? '無內文') ?>
                    </section>
                    
                </article>
            </div>
        </div>
    </div>
</body>
</html>