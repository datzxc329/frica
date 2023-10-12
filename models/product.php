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
    public $categories = [];

    function __construct($idSP, $idLSP, $name, $price, $quantity, $description, $img)
    {
        $this->idSP = $idSP;
        $this->idLSP = $idLSP;
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->description = $description;
        $this->img = $img;
        $this->categories = [];
    }

    static function showProducts()
    {
        try {
            $list = [];
            $db = DB::getInstance();
            $req = $db->query('SELECT * FROM product');

            foreach ($req->fetchAll() as $item) {
                $list[] = new Product($item['idSP'], $item['idLSP'], $item['name'], $item['price'], $item['quantity'], $item['description'], $item['img']);
            }
            return $list;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    static function showWomanClothes(){
        try {
            $list = [];
            $db = DB::getInstance();
            $req = $db->query('SELECT * FROM product WHERE idLSP = 3');

            foreach ($req->fetchAll() as $item) {
                $list[] = new Product($item['idSP'], $item['idLSP'], $item['name'], $item['price'], $item['quantity'], $item['description'], $item['img']);
            }
            return $list;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    static function showManClothes(){
        try {
            $list = [];
            $db = DB::getInstance();
            $req = $db->query('SELECT * FROM product WHERE idLSP = 2');

            foreach ($req->fetchAll() as $item) {
                $list[] = new Product($item['idSP'], $item['idLSP'], $item['name'], $item['price'], $item['quantity'], $item['description'], $item['img']);
            }
            return $list;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    static function showComputers(){
        try {
            $list = [];
            $db = DB::getInstance();
            $req = $db->query('SELECT * FROM product WHERE idLSP = 1');
            foreach ($req->fetchAll() as $item) {
                $list[] = new Product($item['idSP'], $item['idLSP'], $item['name'], $item['price'], $item['quantity'], $item['description'], $item['img']);
            }
            return $list;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    static function showOtherProducts(){
        try {
            $list = [];
            $db = DB::getInstance();
            $req = $db->query('SELECT * FROM product WHERE idLSP >= 4');
            foreach ($req->fetchAll() as $item) {
                $list[] = new Product($item['idSP'], $item['idLSP'], $item['name'], $item['price'], $item['quantity'], $item['description'], $item['img']);
            }
            return $list;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    static function searchWithProductName($name){
        try {
            $db = DB::getInstance();
            $req = $db->prepare('SELECT * FROM product WHERE name LIKE :name');
            $req->execute(array('name' => $name));
            $item = $req->fetchAll();
            //print_r($item);
            return $item;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    static function getProductByIdSP($idSP) {
        try {
            $db = DB::getInstance();
            $req = $db->prepare('SELECT * FROM product WHERE idSP = :idSP');
            $req->execute(array('idSP' => $idSP));
            $item = $req->fetch(PDO::FETCH_ASSOC); // Use fetch(PDO::FETCH_ASSOC) to fetch an associative array
            return $item;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    static function updateProductQuantity($data) {
        try {
            // Implement your database update logic here
            $db = DB::getInstance(); // Assuming you have a database connection class
            $sql = "UPDATE product SET quantity = quantity - :quantityOrdered WHERE idSP = :productId"; // Use 'idSP' instead of 'id'

            $stmt = $db->prepare($sql);
            $stmt->bindParam(':quantityOrdered', $data['quantityOrdered'], PDO::PARAM_INT);
            $stmt->bindParam(':productId', $data['productId'], PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            throw $e;
        }
    }
    static function getProductQuantity($productId){
        try {
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
        } catch (PDOException $e) {
            throw $e;
        }
    }
    static function getProductDetailById($productId){
        try {
            $db = DB::getInstance();
            $sql = "SELECT * FROM product WHERE idSP = :productId";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
            $stmt->execute();
            $productDetail = $stmt->fetch(PDO::FETCH_ASSOC);
            return $productDetail;
        } catch (PDOException $e) {
            throw $e;
        }
    }
}