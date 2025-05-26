<?php
session_start();
require_once '../models/db.php';
require_once '../includes/auth.php';

$sitter_id = $_SESSION['sitter_id'];

// 確認所有欄位都有填寫
if (
    !empty($_POST['name']) &&
    !empty($_POST['email']) &&
    !empty($_POST['phone']) &&
    !empty($_POST['location_city']) &&
    !empty($_POST['location_district']) &&
    isset($_POST['location_detail'])
) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['location_city'];
    $district = $_POST['location_district'];
    $detail = $_POST['location_detail'];

    $sql = "UPDATE sitters SET name = :name, email = :email, phone = :phone,
            location_city = :city, location_district = :district, location_detail = :detail
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':district', $district);
    $stmt->bindParam(':detail', $detail);
    $stmt->bindParam(':id', $sitter_id);
    $stmt->execute();

    header("Location: ../views/Sitter/sitter_home.php");
    exit;

} else {
    echo "請確認所有欄位都已正確填寫。";
    exit;
}
