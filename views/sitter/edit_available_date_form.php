<?php
require_once '../../includes/auth.php';
require_once '../../models/db.php';

$sitter_id = $_SESSION['sitter_id'];
$id = $_GET['id'] ?? null;

if (!$id) {
    echo "缺少資料 ID";
    exit;
}

$sql = "SELECT * FROM sitter_available_dates WHERE id = :id AND sitter_id = :sitter_id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->bindParam(':sitter_id', $sitter_id);
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$data) {
    echo "找不到資料";
    exit;
}
?>

<h2>修改可接待時間</h2>
<form method="post" action="../../controllers/available_date_update.php">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">

    <label>起始日</label>
    <input type="date" name="start_date" value="<?= $data['start_date'] ?>"><br>

    <label>結束日</label>
    <input type="date" name="end_date" value="<?= $data['end_date'] ?>"><br>

    <label>備註</label>
    <input type="text" name="note" value="<?= htmlspecialchars($data['note']) ?>"><br>

    <input type="submit" value="更新">
</form>
