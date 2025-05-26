<?php
session_start();

if (!empty($_POST['id']) && !empty($_POST['password'])) {
    require_once '../models/db.php';
    require_once '../models/sitter_model.php';

    // 建立物件，只需要 id 和 raw password
    $sitter = new Sitter (
        $_POST['id'], "", "", "", "", $_POST['password'], $pdo
    );

    if ($sitter->verifyPassword($_POST['password'])) {
        $_SESSION['sitter_id'] = $sitter->id;
        echo "登入成功！";
        header("Location: ../views/Sitter/sitter_home.php");
        exit;
    } else {
        echo "ID 或密碼錯誤";
        exit("<a href='../public/login.php'>回登入頁</a>");
    }
} else {
    echo "請填寫帳號與密碼";
    exit;
}
?>
