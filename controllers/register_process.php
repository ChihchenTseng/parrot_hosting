<?php

session_start();


if( !empty($_POST['id']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['phone']) && !empty($_POST['location']) )
{
    //連
    require_once '../models/db.php';
    require_once '../models/sitter_model.php';

    $sitter = new Sitter(
        $_POST['id'],
        $_POST['name'],
        $_POST['email'],
        $_POST['phone'],
        $_POST['location'],
        $_POST['password'],
        $pdo
    );

    if($sitter->select()!=0){
        echo "此ID已有人使用，請重新設定";
        exit("<a href='../public/signup.php'>回註冊頁</a>");
    }

    echo $sitter->insert();
    if($sitter->select()!=0){
        echo "註冊成功";
        exit("<a href='../public/login.php'>登入</a>");
    }
    

}
else{

    echo "請填寫所有欄位";
    exit;

}

?>