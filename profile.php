<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
</head>
<body>
    <div id="profile-page" class="container my-4">
        <?php
            include_once "inc/header.php";
            $user = $pdo->query("SELECT * FROM `users` WHERE `username` = '{$_SESSION['user']}'")->fetch();

            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                if($_FILES['header'] && $_FILES['header']['tmp_name']){
                    $max = 1*1024*1024;
                    if($_FILES['header']['size'] > $max OR $_FILES['header']['error']){
                        echo "<script>alert('頭像上傳失敗');location.href='./profile.php'</script>";
                        exit;
                    }
                    $ext = strtolower(pathinfo($_FILES['header']['name']),PATHINFO_EXTENSION);
                    if(!in_array($ext,['jpeg','jpg','png'])){
                        echo "<script>alert('頭像上傳失敗');location.href='./profile.php'</script>";
                        exit;
                    }
                    $filename = $_SESSION['user'] . "img" . "." . $ext;
                    $ok = move_uploaded_file($_FILES['header']['tmp_name'],"./assets/img/profile/$filename");
                    if($ok){
                        $pdo->exec("UPDATE `users` SET `img` = './assets/img/profile/$filename' WHERE `users`.`username` = '{$_SESSION['user']}';");
                        echo "<script>location.href='./profile.php'</script>";
                        exit;
                    }
                }
                if(isset($_POST['bio'])){
                    $bio = $_POST['bio'];
                    
                }
            }
        ?>
        
        <!-- 個人基本資料區 -->
        <section class="profile-header row align-items-center bg-light p-3 my-3 mx-0 border rounded">
            <!-- 左側：頭像表單 -->
            <div class="col-auto text-center">
                <form enctype="multipart/form-data" method="post" class="m-0">
                    <label for="file" style="cursor: pointer;">
                        <input type="file" id="file" name="header" class="d-none" onchange="this.form.submit()">
                        <img src="<?=$user['img']?>" class="profile-avatar rounded-circle border" width="100" height="100" style="object-fit: cover;">
                    </label>
                </form>
            </div>
            
            <!-- 右側：使用者名稱與簡介表單 -->
            <div class="col">
                <div class="profile-username h4 mb-2 text-info fw-bold"><?=$_SESSION['user']?></div>
                <form method="post" class="m-0">
                    <div class="profile-bio">
                        <textarea name="bio" id="bio" rows="2" maxlength="300" class="profile-bio-input form-control form-control-sm" readonly placeholder="尚未填寫自我介紹"><?= !empty($user['bio']) ? $user['bio'] : '尚未填寫自我介紹' ?></textarea>
                    </div>
                </form>
            </div>
        </section>

        <!-- 功能與文章區 -->
        <div class="d-flex justify-content-between align-items-center my-3 border-bottom pb-2">
            <h2 class="h4 m-0 text-secondary">我的文章</h2>
            <a href="./add_article.php" class="new-post-link btn btn-info text-white">發布文章</a>
        </div>

        <section class="profile-articles">
            <?php
            $articles = $pdo->query("SELECT * FROM `articles` WHERE `WP` = '{$_SESSION['user']}'")->fetchAll();
            if(count($articles) < 1){
            ?>
            <div class="empty-article-message alert alert-secondary text-center">目前尚無文章</div>
            <?php
            }else{
            foreach($articles as $article){
            ?>
            <div class="article-item card my-2 shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center py-2 px-3">
                    <div>
                        <div class="article-title fw-bold">文章標題: <?=$article['title']?></div>
                        <small class="text-muted"><time class="article-date">發布日期: <?=$article['date']?></time></small>
                    </div>
                    <a href="./article.php?id=<?=$article['id']?>" class="article-readmore btn btn-outline-info btn-sm">閱讀更多</a>
                </div>
            </div>
            <?php }} ?>
        </section>
    </div>

    <script>
        const $bio = $('#bio');
        if($bio.val() === '尚未填寫自我介紹'){
            $bio.val('');
        }
        $bio.on('click',()=>$bio.prop('readonly',false));
        $bio.on('keydown',(e)=>{
            if(e.key === 'Enter') e.preventDefault();
            e.key === 'Enter' ? $bio.closest('form').submit() : null;
        });
    </script>
</body>
</html> 