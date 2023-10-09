<?php
class Product
{
    public $idSP;
    public $idLSP;
    public $name;
    public $price;
    public $quantity;
    public $description;
    public $img;

    function __construct($idSP, $idLSP, $name, $price, $quantity, $description, $img)
    {
        $this->idSP = $idSP;
        $this->idLSP = $idLSP;
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->description = $description;
        $this->img = $img;
    }

    static function showProducts()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM product');

        foreach ($req->fetchAll() as $item) {
            $list[] = new Product($item['idSP'], $item['idLSP'], $item['name'], $item['price'], $item['quantity'], $item['description'], $item['img']);
        }
        return $list;
    }
    static function showWomanClothes(){
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM product WHERE idLSP = 3');

        foreach ($req->fetchAll() as $item) {
            $list[] = new Product($item['idSP'], $item['idLSP'], $item['name'], $item['price'], $item['quantity'], $item['description'], $item['img']);
        }
        return $list;
    }
    static function showManClothes(){
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM product WHERE idLSP = 2');

        foreach ($req->fetchAll() as $item) {
            $list[] = new Product($item['idSP'], $item['idLSP'], $item['name'], $item['price'], $item['quantity'], $item['description'], $item['img']);
        }
        return $list;
    }
    static function showComputers(){
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM product WHERE idLSP = 1');
        foreach ($req->fetchAll() as $item) {
            $list[] = new Product($item['idSP'], $item['idLSP'], $item['name'], $item['price'], $item['quantity'], $item['description'], $item['img']);
        }
        return $list;
    }

    static function showOtherProducts(){
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM product WHERE idLSP >= 4');
        foreach ($req->fetchAll() as $item) {
            $list[] = new Product($item['idSP'], $item['idLSP'], $item['name'], $item['price'], $item['quantity'], $item['description'], $item['img']);
        }
        return $list;
    }

    static function searchWithProductName($name){
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM product WHERE name LIKE :name');
        $req->execute(array('name' => $name));
        $item = $req->fetchAll();
        //print_r($item);
        return $item;
    }

    static function getProductByIdSP($idSP) {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM product WHERE idSP = :idSP');
        $req->execute(array('idSP' => $idSP));
        $item = $req->fetch(PDO::FETCH_ASSOC); // Use fetch(PDO::FETCH_ASSOC) to fetch an associative array
        return $item;
    }
    static function updateProductQuantity($productId, $quantityOrdered) {
        // Implement your database update logic here
        $db = DB::getInstance(); // Assuming you have a database connection class
        $sql = "UPDATE product SET quantity = quantity - :quantityOrdered WHERE idSP = :productId"; // Use 'idSP' instead of 'id'

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':quantityOrdered', $quantityOrdered, PDO::PARAM_INT);
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        $stmt->execute();
    }
    static function getProductQuantity($productId){
        $db = DB::getInstance();
        $sql = "SELECT quantity FROM product WHERE idSP = :productId";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                return $result['quantity'];
            }
        }
        return 0;
    }

}