<?php
require_once '../../includes/auth.php';
require_once '../../models/db.php';
require_once '../../models/sitter_model.php';

$sitter_id = $_SESSION['sitter_id'];
$available_dates = Sitter::getAvailableDatesBySitterId($sitter_id, $pdo);

$calendar_events = [];
foreach ($available_dates as $row) {
    $calendar_events[] = [
        'title' => $row['note'] ?: '可接時間',
        'start' => $row['start_date'],
        'end' => date('Y-m-d', strtotime($row['end_date'] . ' +1 day'))
    ];
}
?>

<!DOCTYPE HTML>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>可接時間行事曆 - Parrot Hosting</title>
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js'></script>
    <style>
        #calendar {
            max-width: 900px;
            margin: 40px auto;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">你目前設定的可接時間（行事曆檢視）</h2>

    <div id='calendar'></div>

    <h2 style="text-align: center;">新增你的可接時間</h2>
    <form method="post" action="../../controllers/available_date_insert.php" style="text-align: center;">
        <label>起始日：</label>
        <input type="date" name="start_date"><br><br>

        <label>結束日：</label>
        <input type="date" name="end_date"><br><br>

        <label>備註（可填）：</label>
        <input type="text" name="note"><br><br>

        <input type="submit" value="新增">
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'zh-tw',
                height: 'auto',
                events: <?= json_encode($calendar_events) ?>
            });
            calendar.render();
        });
    </script>
</body>
</html>
