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
    static function saveOrderDetail($data){
        // Kết nối đến cơ sở dữ liệu
        try {
            $pdo = DB::getInstance();
            // Chuẩn bị truy vấn SQL
            $sql = "INSERT INTO order_details (idDH, idSP, quantity, unit_price, units_price) VALUES (:idDH, :idSP, :quantity, :unit_price, :units_price)";
            // Sử dụng PDO để thực hiện truy vấn SQL
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":idDH", $data['order_id']);
            $stmt->bindParam(":idSP", $data['product_id']);
            $stmt->bindParam(":quantity", $data['quantity_ordered']);
            $stmt->bindParam(":unit_price", $data['unit_price']);
            $stmt->bindParam(":units_price", $data['units_price']);
            $stmt->execute();
            // Trả về true hoặc thông báo lưu thành công
            return true;
        } catch (PDOException $e) {
            // Xử lý lỗi nếu có
            throw $e;
        }
    }
}