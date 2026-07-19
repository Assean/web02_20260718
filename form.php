<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <!-- 引入 Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5" style="max-width: 600px;">
        <div class="card shadow-sm p-4 bg-white rounded">
            <form action="./api/submit.php" method="post">
                
                <div class="mb-3">
                    <label for="games" class="form-label fw-bold">遊戲</label>
                    <select name="game" id="" required class="form-select">
                        <option required value="數字挑戰">數字挑戰</option>
                        <option required value="記憶挑戰">記憶挑戰</option>
                        <option required value="反應速度">反應速度</option>
                        <option required value="打地鼠">打地鼠</option>
                        <option required value="滑動拼圖">滑動拼圖</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">姓名</label>
                    <input type="name" name="name" id="name" required class="form-control">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">信箱</label>
                    <input type="email" name="email" id="email" required class="form-control">
                </div>

                <div class="mb-3">
                    <label for="good_or_nono" required class="form-label fw-bold">體驗評價</label>
                    <select name="good_or_nono" id="" class="form-select">
                        <option required value="好">好</option>
                        <option required value="不好">不好</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="good_text" class="form-label fw-bold">寶貴意見</label>
                    <textarea name="good_text" id="good_text" cols="30" rows="5" class="form-control"></textarea>
                </div>

                <div class="d-grid">
                    <button class="btn btn-primary">送出</button>
                </div>
            </form>
        </div>
    </div>

    <!-- 引入 Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>