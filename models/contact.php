<?php
class Contact
{
    public $idLH;
    public $name;
    public $email;
    public $phone;
    public $message;
    function __construct($idLH, $name, $email, $phone, $message)
    {
        $this->idLH = $idLH;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->message = $message;
    }

    static function save($name, $email, $phone, $message)
    {
        // Kết nối đến cơ sở dữ liệu
        $pdo = DB::getInstance();

        // Chuẩn bị truy vấn SQL
        $sql = "INSERT INTO contact (name, email, phone, message) VALUES (:name, :email, :phone, :message)";

        try {
            // Sử dụng PDO để thực hiện truy vấn SQL
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":phone", $phone);
            $stmt->bindParam(":message", $message);
            $stmt->execute();


            // Trả về true hoặc thông báo lưu thành công
            return true;
        } catch (PDOException $e) {
            // Xử lý lỗi nếu có
            return "Lỗi khi lưu dữ liệu vào cơ sở dữ liệu: " . $e->getMessage();
        }
    }

}

