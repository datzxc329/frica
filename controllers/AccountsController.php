<?php
require_once('controllers/BaseController.php');
require_once('models/user.php');
class AccountsController extends BaseController
{
    function __construct()
    {
        $this->folder = 'accounts';
    }
    public function login(){

        //so sánh dữ liệu trong form và dữ liệu trong database nếu có tồn tại thì đăng nhập thành công, còn không thì báo lỗi.
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Lấy dữ liệu từ form
            $username = $_POST["username"];
            $password = $_POST["password"];
            if(User::checkLogin($username, $password)){
                header("Location: index.php?controller=accounts&action=successlogin");
            }else{
                echo '<script>alert("Tài khoản không tồn tại!");</script>';
                $this->render('login');
            }
        }else {
            $this->render('login');
        }

    }
    public function signup(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy dữ liệu từ form
            $username = $_POST["username"];
            $password = $_POST["password"];
            $name = $_POST["name"];
            $phone = $_POST["phone"];
            $email = $_POST["email"];
            $address = $_POST["address"];
            if(User::saveSignup($username, $password, $name, $phone, $email, $address)){
                header("Location: index.php?controller=accounts&action=successsignup");
            }else{
                echo '<script>alert("Tài khoản đã tồn tại!");</script>';
                $this->render('signup');
            }
        } else {
            // Nếu không phải phương thức POST, hiển thị form
            $this->render('signup');
        }


    }
    public function forgotpassword(){
        $this->render('forgotpassword');
    }
    public function successlogin()
    {
        $this->render('successlogin');
    }
    public function successsignup()
    {
        $this->render('successsignup');
    }
    public function successchangepw()
    {
        $this->render('successchangepw');
    }


}


//giỏ hàng
//signup
//search
