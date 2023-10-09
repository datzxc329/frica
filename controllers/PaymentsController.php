<?php
require_once('controllers/BaseController.php');
require_once ('models/orders.php');
require_once ('models/product.php');
class PaymentsController extends BaseController{
    function __construct()
    {
        $this->folder = 'payments';
    }

    public function success(){
        $this->render('success');
    }
    public function payments() {
        session_start();
        //print_r($_SERVER["REQUEST_METHOD"]);
        //print_r($_SESSION);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve the list of products that were ordered from the cart
            $cartItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

            // Loop through the cart items and update product quantities using the model method
            foreach ($cartItems as $productId => $cartItem) {
                $quantityOrdered = $cartItem->quantity;
                Product::updateProductQuantity($productId, $quantityOrdered);
            }

            // Save the order
            if (isset($_SESSION["total_price"])) {
                $total_price = $_SESSION["total_price"];
            } else {
                $total_price = 0; // Đặt giá trị mặc định nếu không tồn tại
            }

            $name = $_POST["name"];
            $phone = $_POST["phone"];
            $email = $_POST["email"];
            $address = $_POST["address"];

            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date("Y-m-d H:i:s");

            // Gọi hàm saveOrder từ model Order để lưu dữ liệu
            Orders::saveOrder($name, $email, $address, $phone, $total_price, $date);

            // Clear the cart
            unset($_SESSION['cart']);
            //die("if");
            // Render the success page or perform any other necessary actions
            $this->render('success');
        } else {
            //die('else');
            // If it's not a POST request, display the payment form
            $this->render('payments');
        }
        ob_end_flush();
    }

}
