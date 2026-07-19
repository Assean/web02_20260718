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
            // 在檔案內POST
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                // 1. 處理頭像上傳
                // 判斷檔案大小以及上傳檔案
                if(isset($_FILES['header']) && $_FILES['header']['tmp_name']){
                    $max_size = 2 * 1024 * 1024; 
                    if($_FILES['header']['size'] > $max_size || $_FILES['header']['error'] === UPLOAD_ERR_INI_SIZE) {
                        echo "<script>
                            alert('頭像上傳失敗：檔案大小超過 2MB 限制');
                            location.href='../login.php';
                            </script>";
                        exit;
                    }

                    $uploaded_ext = strtolower(pathinfo($_FILES['header']['name'], PATHINFO_EXTENSION));
                    $filename = $_SESSION['user'] . "_1." . $uploaded_ext;
                    
                    $ok = move_uploaded_file($_FILES['header']['tmp_name'], "./assets/img/profile/$filename");
                    if($ok){
                        $pdo->exec("UPDATE `users` SET `img` = 'assets/img/profile/$filename' WHERE `users`.`username` = '{$_SESSION['user']}'");
                        echo "<script>location.href='./profile.php'</script>";
                        exit;
                    }else{
                        echo "<script>
                            alert('頭像上傳失敗');
                            location.href='../login.php';
                            </script>";
                        exit;
                    }
                }

                // 2. 處理文字簡介更新
                if(isset($_POST['bio'])){
                    $bio = $_POST['bio'];
                    $pdo->exec("UPDATE `users` SET `bio` = '$bio' WHERE `users`.`username` = '{$_SESSION['user']}'");
                    echo "<script>location.href='./profile.php'</script>";
                    exit;
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
            
            <!-- 頭像表單 -->
            <form enctype="multipart/form-data" method="post">
                <label for="file">
                    <input type="file" id="file" name="header" class="d-none" onchange="this.form.submit()">
                    <img src="<?=$user['img']?>" class="profile-avatar">
                </label>
            </form>

            <!-- 簡介表單 -->
            <form enctype="multipart/form-data" method="post">
                <div class="profile-bio">
                    <textarea name="bio" id="bio" cols="30" rows="10" class="profile-bio-input" readonly><?= !empty($user['bio']) ? $user['bio'] : '尚未填寫簡介' ?></textarea>
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
        $bio.on('click', function() {
            $bio.prop('readonly', false);
            if ($bio.val() === '尚未填寫自我介紹') {
                // 運用jquery->value
                $bio.val('');
            }
        });

        $bio.on('keydown', (e) => {
            if(e.key === 'Enter') {
                e.preventDefault();
                $bio.closest('form').submit();
            }
        });
    </script>
</body>
</html>