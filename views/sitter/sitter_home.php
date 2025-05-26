<?php
require_once '../../includes/auth.php';
?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>寄宿家庭首頁</title>
</head>
<body>
    <h2>歡迎，<?php echo htmlspecialchars($_SESSION['sitter_id']); ?>！</h2>

    <ul>
        <li><a href="edit_available_dates.php">設定可接時間</a></li>
        <li><a href="edit_photo.php">上傳 / 修改照片</a></li>
        <li><a href="edit_breed_preferences.php">設定可接受的鸚鵡品種</a></li>
        <li><a href="sitter_order_list.php">查看我的訂單</a></li>
        <li><a href="../../controllers/logout.php">登出</a></li>
    </ul>

</body>
</html>
