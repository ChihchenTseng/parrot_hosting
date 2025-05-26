<?php
require_once '../../includes/auth.php';
require_once '../../models/db.php';
require_once '../../models/sitter_model.php';

$sitter_id = $_SESSION['sitter_id'];
$available_dates = Sitter::getAvailableDatesBySitterId($sitter_id, $pdo);


?>

<!DOCTYPE HTML>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title> 修改 - Parrot Hosting</title>
</head>

<body>
    <h2>你目前設定的可接時間</h2>

    <table border="1">
        <tr>
            <th>起始日</th>
            <th>結束日</th>
            <th>備註</th>
        </tr>

        <?php foreach ($available_dates as $row): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['start_date']); ?></td>
                <td><?php echo htmlspecialchars($row['end_date']); ?></td>
                <td><?php echo htmlspecialchars($row['note']); ?></td>

                <td>
                    <a href="edit_available_date_form.php?id=<?= $row['id'] ?>">修改</a>
                </td>
                <td>
                    <form method="post" action="../../controllers/available_date_delete.php" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <input type="submit" value="刪除" onclick="return confirm('確定要刪除這筆可接時間嗎？');">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>新增你的可接時間</h2>
    <form method="post" action="available_date_insert.php">
        <label>起始日</label>
        <input type='date' name="start_date"><br>
        <label>結束日</label>
        <input type='date' name="end_date"><br>
        <input type='submit' value="新增">
        <label>備註（可選）：</label>
        <input type="text" name="note"><br>
    </form>



</body>
</html>




