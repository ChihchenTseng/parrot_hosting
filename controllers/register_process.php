<?php

session_start();

if( !empty($_POST['id']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['phone']) && !empty($_POST['location']) )
{
    //
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $location =$_POST['location'];

    $raw_password = $_POST['password'];
    $hashed_password = password_hash($raw_password, PASSWORD_DEFAULT);
    

    //連
    require_once '../models/db.php';

    $sql_select = "SELECT * FROM  sitters WHERE id=:id";

    $stmt = $pdo -> prepare($sql_select);
    $stmt -> bindParam(':id', $id);
    $stmt -> execute();
    
    if($stmt->rowCount()!=0){
        echo "此ID已有人使用，請重新設定";
        exit("<a href='../public/signup.php'>回註冊頁</a>");
    }


    //模板
    $sql_insert = "INSERT INTO sitters (id,name, email, password, phone, location)
        VALUES (:id, :name, :email, :password, :phone, :location)";
    //pdo先處理SQL語句然建立容器裝變數
    $stmt = $pdo -> prepare($sql_insert);
    //綁參數
    $stmt -> bindParam(':id', $id);
    $stmt -> bindParam(':name', $sname);
    $stmt -> bindParam(':email', $email);
    $stmt -> bindParam(':password', $hashed_password);
    $stmt -> bindParam(':phone', $phone);
    $stmt -> bindParam(':location', $slocation);
    //執行
    $stmt -> execute();
    if($stmt->rowCount()!=0){
        echo "註冊成功";
        exit("<a href='../public/login.php'>登入</a>");
    }

}
else{

    echo "請填寫所有欄位";
    exit;

}


?>