<?php
class Sitter_select {
    public $id;
    public $name;   // 一個屬性（property）
    public $phone;

    // 建構子：物件建立時會自動執行這裡
    public function __construct($id ,$name, $phone) {
        $this->name = $name;
        $this->phone = $phone;
    }

    // 一個方法（method）
    public function sayHello() {
        echo "嗨，我是 " . $this->name . "，聯絡電話：" . $this->phone . "<br>";
    }
}
?>