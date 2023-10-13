<?php
require_once('controllers/BaseController.php');
require_once ('models/orders.php');
require_once ('models/order_details.php');
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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve the list of products that were ordered from the cart
            $cartItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

            // Loop through the cart items and update product quantities using the model method
            foreach ($cartItems as $productId => $cartItem) {
                $data = array(
                    'quantityOrdered' => $cartItem->quantity,
                    'productId' => $productId
                );
                Product::updateProductQuantity($data);
            }
            // Prepare the data for the order
            $orderData = [
                'name' => $_POST["name"],
                'phone' => $_POST["phone"],
                'email' => $_POST["email"],
                'address' => $_POST["address"],
                'date' => date("Y-m-d H:i:s"),
                'total_price' => isset($_SESSION["total_price"]) ? $_SESSION["total_price"] : 0,
            ];
            // Save the order
            $result = Orders::saveOrder($orderData);
            try {
                if ($result === true) {
                    // Get the ID of the newly created order
                    $pdo = DB::getInstance();
                    $orderId = $pdo->lastInsertId();
                    // Loop through the cart items and save order details for each item
                    foreach ($cartItems as $productId => $cartItem) {
                        $quantityOrdered = $cartItem->quantity;
                        $unitPrice = $cartItem->price;
                        $unitsPrice = $cartItem->quantity * $cartItem->price;
                        // Prepare the data for the order detail
                        $orderDetailData = [
                            'order_id' => $orderId,
                            'product_id' => $productId,
                            'quantity_ordered' => $quantityOrdered,
                            'unit_price' => $unitPrice,
                            'units_price' => $unitsPrice,
                        ];
                        // Save the order detail
                        Order_details::saveOrderDetail($orderDetailData);
                    }
                    unset($_SESSION['cart']);
                    $this->render('success');
                } else {
                    echo 'Lỗi khi lưu đơn hàng: ' . $result;
                }
            }catch (Exception $e){
                throw $e;
            }
        } else {
            // If it's not a POST request, display the payment form
            $this->render('payments');
        }
        ob_end_flush();
    }
}
