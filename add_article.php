<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
</head>
<body>
    <div id="add-article">
        <?php include_once "inc/header.php"; ?>
        <form action="./api/add_article.php" method="post" class="article-create-form">
            <!-- <form action="" method="post"></form> -->
            <div>
                <label for="title">文章標題</label>
                <input type="text" name="title" class="article-title-input">
            </div>
            <div>
                <label for="title">文章內容</label>
                <textarea name="content" id="" cols="30" rows="10" class="article-content-input"></textarea>
            </div>
            <button class="article-submit-button">發布文章</button>
        </form>
    </div>
</body>
</html>