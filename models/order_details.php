<?php
class Order_details
{
    public $idCTDH;
    public $idDH;
    public $idSP;
    public $quantity;
    public $unit_price;
    public $units_price;

    function __construct($idCTDH, $idDH, $idSP, $quantity, $unit_price, $units_price)
    {
        $this->idCTDH = $idCTDH;
        $this->idDH = $idDH;
        $this->idSP = $idSP;
        $this->quantity = $quantity;
        $this->unit_price = $unit_price;
        $this->units_price = $units_price;
    }
    static function saveOrderDetail($idDH, $idSP, $quantity, $unit_price, $units_price){
        // Kết nối đến cơ sở dữ liệu
        $pdo = DB::getInstance();

        // Chuẩn bị truy vấn SQL
        $sql = "INSERT INTO order_details (idDH, idSP, quantity, unit_price, units_price) VALUES (:idDH, :idSP, :quantity, :unit_price, :units_price)";

        try {
            // Sử dụng PDO để thực hiện truy vấn SQL
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":idDH", $idDH);
            $stmt->bindParam(":idSP", $idSP);
            $stmt->bindParam(":quantity", $quantity);
            $stmt->bindParam(":unit_price", $unit_price);
            $stmt->bindParam(":units_price", $units_price);

            $stmt->execute();

            // Trả về true hoặc thông báo lưu thành công
            return true;
        } catch (PDOException $e) {
            // Xử lý lỗi nếu có
            return "Lỗi khi lưu dữ liệu vào cơ sở dữ liệu: " . $e->getMessage();
        }
    }
}