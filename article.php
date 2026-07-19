<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
</head>
<body>
    <div id="article">
        <?php include_once "inc/header.php";
                $id = $_GET['id'] ?? '';
                $article = $pdo->query("SELECT * FROM `articles` WHERE `id` = '$id'")->fetch();        
        ?>
        <header class="article-header">
            <h1 class="article-title">文章標題:<?=$article['title']?></h1>
            <time class="article-date">文章發布日期:<?=$article['date']?></time>
            <section class="article-body">
                <?=$article['content']?>
            </section>
        </header>
    </div>
</body>
</html>