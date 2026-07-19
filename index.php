<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
</head>
<body>
    <div id="home">
        <?php include_once "inc/header.php"; ?>
        <section class="articles">
        <?php
            $articles = $pdo->query("SELECT * FROM `articles`")->fetchAll();
            foreach($articles as $article){
        ?>
            <article class="article-item border m-2 p-2">
                <div class="article-title">文章標題:<?=$article['title']?></div>
                <time class="article-date">發布日期:<?=$article['date']?></time>
                <div class="article-excerpt">文章摘要:<?=$article['content']?></div>
                <a href="./article.php?id=<?=$article['id']?>" class="article-readmore">閱讀更多</a>
            </article>
        <?php } ?>
        </section>
        <aside class="notifications">
            <?php for ($i=0; $i < 5; $i++) { ?>
            <div class="notification-item border m-2 p-2">
                <div class="notification-title">通知標題:test</div>
                <time class="notification-date">發布日期:2026/07/18</time>
            </div>
            <?php } ?>
        </aside>
    </div>
</body>
</html>