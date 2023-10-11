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

    static function checkLogin($data){
        try {
            //checkLogin: kiểm tra nếu có dữ liệu tài khoản trong database thì đăng nhập vào.
            $pdo = DB::getInstance();
            $sql = "SELECT COUNT(*) FROM user WHERE username = :username AND password = :password";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':username', $data['username'], PDO::PARAM_STR);
            $stmt->bindParam(':password', $data['password'], PDO::PARAM_STR);
            $stmt->execute();
            $count = $stmt->fetchColumn();
            if ($count != 0) {
                return true;
            }else{
                return false;
            }
        } catch (PDOException $e) {
            throw $e;
        }
    }
    static function getUserInfo($username) {
        try {
            $pdo = DB::getInstance();
            $sql = "SELECT * FROM user WHERE username = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();
            $userInfo = $stmt->fetch(PDO::FETCH_ASSOC);
            return $userInfo;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    static function saveSignup($data)
    {
        try {
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
                    $stmt2->bindParam(":username", $data['username']);
                    $stmt2->bindParam(":password", $data['password']);
                    $stmt2->bindParam(":name", $data['name']);
                    $stmt2->bindParam(":phone", $data['phone']);
                    $stmt2->bindParam(":email", $data['email']);
                    $stmt2->bindParam(":address", $data['address']);
                    $stmt2->execute();
                } catch (PDOException $e) {
                    throw $e;
                }
            } else {
                return false;
            }
        }catch (PDOException $e) {
            throw $e;
        }
    }


}
