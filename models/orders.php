<?php
class Orders
{
    public $idDH;
    public $name;
    public $email;
    public $address;
    public $phone;
    public $total_price;
    public $date;

    function __construct($idDH, $name, $email, $address, $phone, $total_price, $date)
    {
        $this->idDH = $idDH;
        $this->name = $name;
        $this->email = $email;
        $this->address = $address;
        $this->phone = $phone;
        $this->total_price = $total_price;
        $this->date = $date;
    }

    static function saveOrder($data){
        try {
            // Kết nối đến cơ sở dữ liệu
            $pdo = DB::getInstance();
            // Chuẩn bị truy vấn SQL
            $sql = "INSERT INTO orders (name, email, address, phone, total_price, date) VALUES (:name, :email, :address, :phone, :total_price, :date)";
            // Sử dụng PDO để thực hiện truy vấn SQL
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":name", $data['name']);
            $stmt->bindParam(":email", $data['email']);
            $stmt->bindParam(":address", $data['address']);
            $stmt->bindParam(":phone", $data['phone']);
            $stmt->bindParam(":total_price", $data['total_price']);
            $stmt->bindParam(":date", $data['date']);
            $stmt->execute();
            // Trả về true hoặc thông báo lưu thành công
            return true;
        } catch (PDOException $e) {
            // Xử lý lỗi nếu có
            throw $e;
        }
    }

}