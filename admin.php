<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
</head>
<body>
    <div id="admin">
        <?php include_once "inc/header.php"; ?>
        <a class="border p-2 m-1" href="./admin">基本設定</a>
        <a class="border p-2 m-1" href="./admin_result.php">問卷回應</a>
        <a class="border p-2 m-1" href="./admin_imgtable.php">統計圖表</a>
        <a class="border p-2 m-1" href="./form.php">瀏覽表單</a>

        <h1>基本設定</h1>
        <label for="">是否啟用表單</label>
        <select name="tof" id="">
            <option value="是">是</option>
            <option value="否">否</option>
        </select>
        <label for="">開始時間</label>
        <input type="datetime-local" name="start_time" id="">
        <label for="">結束時間</label>
        <input type="datetime-local" name="stop_time" id="">
        <button>儲存</button>
    </div>
</body>
</html>