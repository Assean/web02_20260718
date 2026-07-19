<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <form action="./api/submit.php" method="post">
        <label for="games">遊戲</label>
        <select name="game" id="" required>
            <option required value="數字挑戰">數字挑戰</option>
            <option required value="記憶挑戰">記憶挑戰</option>
            <option required value="反應速度">反應速度</option>
            <option required value="打地鼠">打地鼠</option>
            <option required value="滑動拼圖">滑動拼圖</option>
        </select>
        <div>
            <label for="name">姓名</label>
            <input type="name" name="name" id="name" required>
        </div>
        <div>
            <label for="email">信箱</label>
            <input type="email" name="email" id="email" required>
        </div>
        <label for="good_or_nono" required>體驗評價</label>
        <select name="good_or_nono" id="">
            <option required value="好">好</option>
            <option required value="不好">不好</option>
        </select>
        <label for="good_text">寶貴意見</label>
        <textarea name="good_text" id="good_text" cols="30" rows="10"></textarea>
        <button>送出</button>
    </form>
</body>
</html>