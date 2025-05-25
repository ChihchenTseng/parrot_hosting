<?php
class Sitter {
    private $pdo;
    public $id, $name, $email, $phone, $location, $hashed_password;

    public function __construct($id, $name, $email, $phone, $location, $raw_password, $pdo) {
        
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->location = $location;
        $this->hashed_password = password_hash($raw_password, PASSWORD_DEFAULT);
        $this->pdo = $pdo;//pdo也是外部變數

    }

    public function select() {
        $sql_select = "SELECT * FROM  sitters WHERE id=:id";

        $stmt = $this->pdo -> prepare($sql_select);
        $stmt -> bindParam(':id', $this->id);
        $stmt -> execute();
        return $stmt->rowCount();
    }
    public function insert() {
        $sql_insert = "INSERT INTO sitters (id,name, email, password, phone, location)
        VALUES (:id, :name, :email, :password, :phone, :location)";
        //pdo先處理SQL語句然建立容器裝變數
        $stmt = $this->pdo -> prepare($sql_insert);
        //綁參數
        $stmt -> bindParam(':id', $this->id);
        $stmt -> bindParam(':name', $this->name);
        $stmt -> bindParam(':email', $this->email);
        $stmt -> bindParam(':password', $this->hashed_password);
        $stmt -> bindParam(':phone', $this->phone);
        $stmt -> bindParam(':location', $this->location);
        //執行
        $stmt -> execute();
    }
}
?>
