<?php
session_start();
require_once '../includes/auth.php';
require_once '../models/db.php';

if (!empty($_POST['id']) && !empty($_POST['start_date']) && !empty($_POST['end_date'])) {
    $id = $_POST['id'];
    $sitter_id = $_SESSION['sitter_id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $note = $_POST['note'];

    $sql = "UPDATE sitter_available_dates
            SET start_date = :start_date, end_date = :end_date, note = :note
            WHERE id = :id AND sitter_id = :sitter_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':start_date', $start_date);
    $stmt->bindParam(':end_date', $end_date);
    $stmt->bindParam(':note', $note);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':sitter_id', $sitter_id);
    $stmt->execute();

    header("Location: ../views/Sitter/edit_available_dates.php");
    exit;
} else {
    echo "資料未填寫完整";
    header("Location: ../views/Sitter/edit_available_dates_form.php");
    exit;
}
