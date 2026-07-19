<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
</head>
<body>
    <div id="admin" class="container my-4">
        <?php include_once "inc/header.php"; ?>
        
        <!-- 上方功能導覽標籤 -->
        <nav class="nav nav-pills my-4">
            <a class="nav-link active m-1 bg-info text-white" href="./admin.php">基本設定</a>
            <a class="nav-link border m-1 text-secondary" href="./admin_result.php">問卷回應</a>
            <a class="nav-link border m-1 text-secondary" href="./admin_imgtable.php">統計圖表</a>
            <a class="nav-link border m-1 text-secondary" href="./form.php">瀏覽表單</a>
        </nav>

        <h1 class="h3 mb-4 text-secondary border-bottom pb-2">基本設定</h1>
        
        <!-- 表單設定區塊 -->
         <form action="" method="post">
             <div class="card shadow-sm p-4" style="max-width: 600px;">
                 <div class="mb-3">
                     <label for="" class="form-label fw-bold">是否啟用表單</label>
                     <select name="tof" id="" class="form-select">
                         <option value="是">是</option>
                         <option value="否">否</option>
                     </select>
                 </div>
                 
                 <div class="row">
                     <div class="col-md-6 mb-3">
                         <label for="" class="form-label fw-bold">開始時間</label>
                         <input type="datetime-local" name="start_time" id="" class="form-control">
                     </div>
                     <div class="col-md-6 mb-3">
                         <label for="" class="form-label fw-bold">結束時間</label>
                         <input type="datetime-local" name="stop_time" id="" class="form-control">
                     </div>
                 </div>
                 
                 <div class="mt-2">
                     <button class="btn btn-info text-white px-4">儲存</button>
                 </div>
             </div>
         </form>
    </div>
</body>
</html>