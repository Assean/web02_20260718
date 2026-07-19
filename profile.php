<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
</head>
<body>
    <div id="profile-page">
        <?php
            include_once "inc/header.php";
            $user = $pdo->query("SELECT * FROM `users` WHERE `username` = '{$_SESSION['user']}'")->fetch();
            // print_r($_SERVER);
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                if($_FILES['header']['tmp_name']){
                    $ext = ['image/jpeg','.jpg','image/png','.png','image/gif','.gif']
                    [(new finfo($_FILES['header']['tmp_name']))->file("{$user['img']}")] ?? '.jpg';
                    $filename = $_SESSION['user'] . "_1" . $filename;
                    $ok = move_uploaded_file($_FILES['header']['tmp_name'],"./assets/img/profile/$filename");
                    if($ok){
                        $pdo->exec("UPDATE `users` SET `bio` = 'assets/img/profile/$filename' WHERE `users`.`username` = '{$_SESSION['user']}'");
                        echo "<script>location.href='./profile.php'</script>";
                    }else{
                        echo "<script>
                            alert('頭像上傳失敗');
                            location.href='../login.php';
                            </script>";
                            exit;
                    }
                }

                $bio = $_POST['bio'];
                if(isset($bio)){
                    $pdo->exec("UPDATE `users` SET `bio` = '$bio' WHERE `users`.`username` = '{$_SESSION['user']}'");
                    echo "<script>location.href='./profile.php'</script>";
                }else{
                    echo "<script>
                        alert('簡介更新失敗');
                        location.href='../login.php';
                        </script>";
                        exit;
                }
            }
        ?>
        <section class="profile-header">
            
            <form enctype="multipart/form-data" method="post">
                <label for="file">
                    <input type="file" id="file" name="header" class="d-none" onchange="this.form.submit()">
                    <img src="<?=$user['img']?>"  class="profile-avatar">
                </label>
            </form>

            <form enctype="multipart/form-data" method="post">
                <div class="profile-bio">
                    <textarea name="bio" id="bio" cols="30" rows="10" class="profile-bio-input" readonly><?=$user['bio']?></textarea>
                </div>
            </form>

            <div class="profile-username"><?=$_SESSION['user']?></div>
        </section>
        <a href="./add_article.php" class="new-post-link">發布文章</a>
        <section class="profile-articles">
            <?php
            $articles = $pdo->query("SELECT * FROM `articles` WHERE `WP` = '{$_SESSION['user']}'")->fetchAll();
            if(count($articles) < 1){
            ?>
            <div class="empty-article-message">目前尚無文章</div>
        <?php
            }else{
            foreach($articles as $article){
        ?>
        <!-- 尚未 -->
            <div class="article-item border m-2 p-2">
                <div class="article-title">文章標題:<?=$article['title']?></div>
                <time class="article-date">發布日期:<?=$article['date']?></time>
                <a href="./article.php?id=<?=$article['id']?>" class="article-readmore">閱讀更多</a>
            </div>
        <?php }} ?>
        </section>
    </div>
    <script>
        const $bio = $('#bio');
        $bio.on('click',()=>$bio.prop('readonly',false));
        $bio.on('keydown',(e)=>{
            if(e.key === 'Enter') e.preventDefault();
            e.key === 'Enter' ? $bio.closest('form').submit() : null;
        })
    </script>
</body>
</html>