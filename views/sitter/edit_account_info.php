<?php
require_once '../../includes/auth.php';
require_once '../../models/db.php';

$sitter_id = $_SESSION['sitter_id'];

$sql = "SELECT name, email, phone, location_city, location_district, location_detail FROM sitters WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $sitter_id);
$stmt->execute();
$sitter = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$sitter) {
    echo "查無此帳號";
    exit;
}
?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>修改帳戶資訊 - Parrot Hosting</title>
    <script>
        const locationData = {
            "臺北市": ["中正區", "大同區", "中山區", "松山區", "大安區", "萬華區", "信義區", "士林區", "北投區", "內湖區", "南港區", "文山區"],
            "新北市": ["板橋區", "新莊區", "中和區", "永和區", "土城區", "樹林區", "三重區", "蘆洲區"]
            // 可擴充其他縣市與鄉鎮市區
        };

        function updateDistrictOptions() {
            const citySelect = document.getElementById("city");
            const districtSelect = document.getElementById("district");
            const selectedCity = citySelect.value;
            const districts = locationData[selectedCity] || [];

            districtSelect.innerHTML = "";
            districts.forEach(function(d) {
                const option = document.createElement("option");
                option.value = d;
                option.text = d;
                districtSelect.appendChild(option);
            });
        }

        document.addEventListener("DOMContentLoaded", function() {
            updateDistrictOptions();
        });
    </script>
</head>
<body>
    <h2>修改你的帳戶資訊</h2>

    <form method="post" action="../../controllers/update_account_info.php">
        <label>姓名：</label>
        <input type="text" name="name" value="<?= htmlspecialchars($sitter['name']) ?>"><br><br>

        <label>Email：</label>
        <input type="email" name="email" value="<?= htmlspecialchars($sitter['email']) ?>"><br><br>

        <label>電話：</label>
        <input type="text" name="phone" value="<?= htmlspecialchars($sitter['phone']) ?>"><br><br>

        <label>縣市：</label>
        <select id="city" name="location_city" onchange="updateDistrictOptions()">
            <?php foreach (array_keys(locationData) as $city): ?>
                <option value="<?= $city ?>" <?= ($sitter['location_city'] === $city ? 'selected' : '') ?>><?= $city ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label>鄉鎮市區：</label>
        <select id="district" name="location_district"></select><br><br>

        <label>詳細地址：</label>
        <input type="text" name="location_detail" value="<?= htmlspecialchars($sitter['location_detail']) ?>"><br><br>

        <input type="submit" value="更新資料">
    </form>
</body>
</html>
