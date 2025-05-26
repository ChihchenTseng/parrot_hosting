<?php
session_start();
require_once '../models/db.php';
require_once '../includes/auth.php';

if (!empty($_POST['id'])) {
    $id = $_POST['id'];
    $sitter_id = $_SESSION['sitter_id'];

    $sql = "DELETE FROM sitter_available_dates WHERE id = :id AND sitter_id = :sitter_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':sitter_id', $sitter_id);
    $stmt->execute();
}

header("Location: ../views/Sitter/edit_available_dates.php");
exit;
