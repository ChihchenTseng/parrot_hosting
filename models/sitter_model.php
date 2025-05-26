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
        $sql = "SELECT * FROM  sitters WHERE id=:id";

        $stmt = $this->pdo -> prepare($sql);
        $stmt -> bindParam(':id', $this->id);
        $stmt -> execute();
        return $stmt->rowCount();
    }
    public function insert() {
        $sql = "INSERT INTO sitters (id,name, email, password, phone, location)
        VALUES (:id, :name, :email, :password, :phone, :location)";
        //pdo先處理SQL語句然建立容器裝變數
        $stmt = $this->pdo -> prepare($sql);
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

    public function verifyPassword($input_password) {
        $sql = "SELECT password FROM sitters WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();

        if ($stmt->rowCount() == 0) {
            return false;
        }

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return password_verify($input_password, $row['password']);
    }

    public static function getAvailableDatesBySitterId($sitter_id, $pdo) {

    $sql = "SELECT id, start_date, end_date, note 
            FROM sitter_available_dates
            WHERE sitter_id = :id
            ORDER BY start_date";

        $stmt = $pdo->prepare($sql);//$this不可以在static用
        $stmt->bindParam(':id', $sitter_id);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}
?>
