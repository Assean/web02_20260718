<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
</head>
<body>
    <div id="add-article" class="container py-5">
        <?php include_once "inc/header.php"; ?>
        
        <div class="row justify-content-center mt-4">
            <div class="col-lg-8">
                <!-- 使用卡片建立沉浸式的寫作區塊 -->
                <div class="card shadow-sm">
                    <div class="card-header bg-white py-3 border-bottom-0">
                        <h3 class="card-title h5 font-weight-bold mb-0 text-dark">✍️ 發表新文章</h3>
                    </div>
                    <div class="card-body">
                        <form action="./api/add_article.php" method="post" class="article-create-form">
                            
                            <!-- 文章標題區塊 -->
                            <div class="form-group mb-4">
                                <label for="title" class="font-weight-bold text-secondary">文章標題</label>
                                <input type="text" name="title" id="title" class="form-control form-control-lg article-title-input" placeholder="請輸入吸引人的標題...">
                            </div>
                            
                            <!-- 文章內容區塊 -->
                            <div class="form-group mb-4">
                                <label for="content" class="font-weight-bold text-secondary">文章內容</label>
                                <!-- 移除原本死板的 cols 屬性，交由 class 控制寬度 -->
                                <textarea name="content" id="content" rows="10" class="form-control article-content-input" placeholder="撰寫你的文章內容..."></textarea>
                            </div>
                            
                            <!-- 按鈕區塊：靠右對齊 -->
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="javascript:history.back()" class="btn btn-light px-4">取消</a>
                                <button type="submit" class="btn btn-primary px-5 font-weight-bold article-submit-button">發布文章</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>