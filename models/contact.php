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

    static function save($data)
    {
        try {
        // Kết nối đến cơ sở dữ liệu
        $pdo = DB::getInstance();
        // Chuẩn bị truy vấn SQL
        $sql = "INSERT INTO contact (name, email, phone, message) VALUES (:name, :email, :phone, :message)";
            // Sử dụng PDO để thực hiện truy vấn SQL
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":name", $data['name']);
            $stmt->bindParam(":email", $data['email']);
            $stmt->bindParam(":phone", $data['phone']);
            $stmt->bindParam(":message", $data['message']);
            $stmt->execute();
            // Trả về true hoặc thông báo lưu thành công
        } catch (PDOException $e) {
            // Xử lý lỗi nếu có
            throw $e;
        }
    }

}

