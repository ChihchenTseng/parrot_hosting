<?php

$host='localhost';
$dbname = 'parrot_hosting';
$dbuser ='root';
$dbuserpass = '';

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8" , $dbuser, $dbuserpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    echo "資料庫連線失敗: " . $e->getMessage();
    exit;
}