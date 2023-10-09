<?php
class Orders
{
    public $idOrder;
    public $name;
    public $email;
    public $address;
    public $phone;
    public $total_price;
    public $date;

    function __construct($idOrder, $name, $email, $address, $phone, $total_price, $date)
    {
        $this->idOrder = $idOrder;
        $this->name = $name;
        $this->email = $email;
        $this->address = $address;
        $this->phone = $phone;
        $this->total_price = $total_price;
        $this->date = $date;
    }

    static function saveOrder($name, $email, $address, $phone, $total_price, $date){
        // Kết nối đến cơ sở dữ liệu
        $pdo = DB::getInstance();

        // Chuẩn bị truy vấn SQL
        $sql = "INSERT INTO orders (name, email, address, phone, total_price, date) VALUES (:name, :email, :address, :phone, :total_price, :date)";

        try {
            // Sử dụng PDO để thực hiện truy vấn SQL
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":address", $address);
            $stmt->bindParam(":phone", $phone);
            $stmt->bindParam(":total_price", $total_price);
            $stmt->bindParam(":date", $date);

            $stmt->execute();


            // Trả về true hoặc thông báo lưu thành công
            return true;
        } catch (PDOException $e) {
            // Xử lý lỗi nếu có
            return "Lỗi khi lưu dữ liệu vào cơ sở dữ liệu: " . $e->getMessage();
        }
    }

}