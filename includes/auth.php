<?php
// 啟動 session（如果尚未啟動）
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 檢查是否登入
if (!isset($_SESSION['sitter_id'])) {
    echo "請先登入，才能進入此頁面。";
    exit("<a href='../../public/login.php'>前往登入</a>");
}
?>
