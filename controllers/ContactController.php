<?php
require_once('controllers/BaseController.php');
require_once ('models/contact.php');
class ContactController extends BaseController{
    function __construct()
    {
        $this->folder = 'contact';
    }

    public function thanks(){
        $this->render('thanks');
    }
    public function contact() {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Lấy dữ liệu từ form
            $name = $_POST["name"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $message = $_POST["message"];

            // Gọi hàm save từ model Contact để lưu dữ liệu
            Contact::save($name, $email, $phone, $message);

            // Chuyển hướng đến trang cảm ơn
            header("Location: index.php?controller=contact&action=thanks");
        } else {
            // Nếu không phải phương thức POST, hiển thị form
            $this->render('contact');
        }
    }

}