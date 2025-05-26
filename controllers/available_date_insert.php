<?php
require_once '../models/db.php';
require_once '../models/sitter_model.php';

session_start();
$sitter_id = $_SESSION['sitter_id'];

if($_POST['start_date']!="" && $_POST['end_date']!=""){

    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $note = $_POST['note'];

    $sql = "INSERT INTO sitter_available_dates (sitter_id, start_date, end_date, note)
            VALUES (:sitter_id, :start_date, :end_date, :note)";

    $stmt = $pdo->prepare($sql); 
    $stmt -> bindParam(':sitter_id', $sitter_id);
    $stmt -> bindParam(':start_date', $start_date);
    $stmt -> bindParam(':end_date', $end_date);
    if($note!=""){
        $stmt -> bindParam(':note', $note);
    }

    $stmt->execute();
    

    header("Location: ../views/Sitter/edit_available_dates.php");
    exit;


}
else{
    echo"請確認欄位是否皆已填妥";
    exit;
}