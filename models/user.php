<?php
class User
{
    public $idUser;
    public $username;
    public $password;
    public $name;
    public $phone;
    public $email;
    public $address;

    function __construct($idUser, $username, $password, $name, $phone, $email, $address)
    {
        $this->idUser = $idUser;
        $this->username = $username;
        $this->password = $password;
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->address = $address;
    }

    static function checkLogin($username, $password){

        //checkLogin: kiểm tra nếu có dữ liệu tài khoản trong database thì đăng nhập vào.
        $pdo = DB::getInstance();
        $sql = "SELECT COUNT(*) FROM user WHERE username = :username AND password = :password";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        if ($count != 0) {
            return true;
        }else{
            return false;
        }

    }

    static function saveSignup($username, $password, $name, $phone, $email, $address)
    {
        // Kết nối đến cơ sở dữ liệu
        $pdo = DB::getInstance();

        $sql1 = "SELECT COUNT(*) FROM user WHERE username = :username";
        $stmt1 = $pdo->prepare($sql1);
        $stmt1->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt1->execute();
        $count = $stmt1->fetchColumn();

        if ($count == 0) {
            // Chuẩn bị truy vấn SQL
            $sql2 = "INSERT INTO user (username, password, name, phone, email, address) VALUES (:username, :password, :name, :phone, :email, :address)";

            try {
                // Sử dụng PDO để thực hiện truy vấn SQL
                $stmt2 = $pdo->prepare($sql2);
                $stmt2->bindParam(":username", $username);
                $stmt2->bindParam(":password", $password);
                $stmt2->bindParam(":name", $name);
                $stmt2->bindParam(":phone", $phone);
                $stmt2->bindParam(":email", $email);
                $stmt2->bindParam(":address", $address);
                $stmt2->execute();
                return true;
            } catch (PDOException $e) {
                // Xử lý lỗi nếu có
                return "Lỗi khi lưu dữ liệu vào cơ sở dữ liệu: " . $e->getMessage();
            }
        }else{
            return false;
        }

    }


}
