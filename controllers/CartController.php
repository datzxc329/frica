
<?php
require_once('controllers/BaseController.php');
require_once ('models/product.php');
class CartController extends BaseController{
    function __construct()
    {
        $this->folder = 'cart';
    }
    public function add_cart() {

        $this->render('add_cart');
    }
    public function cart() {

        session_start();
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        // Lấy danh sách các mặt hàng trong giỏ hàng từ session (nếu có)
        $cartItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        //unset($_SESSION['cart']);

        if (isset($_GET['idSP']) && is_numeric($_GET['idSP'])) {

            $productId = $_GET['idSP'];
            $productInfo = Product::getProductByIdSP($productId);

            // Kiểm tra xem sản phẩm có tồn tại không
            if ($productInfo) {

                // Tạo đối tượng Product từ thông tin sản phẩm
                $cartItem = new Product(
                    $productInfo['idSP'],
                    $productInfo['idLSP'],
                    $productInfo['name'],
                    $productInfo['price'],
                    1,
                    $productInfo['description'],
                    $productInfo['img']
                );
                //print_r($cartItems);
                //Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
                if (isset($cartItems[$productId])) {

                    // Nếu đã có, tăng số lượng

                    $cartItems[$productId]->quantity += 1;
                } else {

                    // Nếu chưa có, thêm sản phẩm vào giỏ hàng
                    $cartItems[$productId] = $cartItem;

                }
                $_SESSION['cart'] = $cartItems;
                //$_SESSION['cart'] = [];
                //print_r($_SESSION);
            }
        }
        //print_r($_SESSION['cart']);
        //die('sdadasdasssssssssxxxxxxxxxxxxxxxxxxxx');

        $data = array('cartItems' => $cartItems);
        $this->render('cart', $data);
        ob_end_flush();
    }
    public function delete() {
        session_start();
        // Kiểm tra xem yêu cầu có phải là POST không

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy product_id từ yêu cầu POST
            $product_id = $_POST['product_id'];

            // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng không
            if (isset($_SESSION['cart'][$product_id])) {
                // Xóa sản phẩm khỏi giỏ hàng
                unset($_SESSION['cart'][$product_id]);
            }
        }
        // Chuyển hướng người dùng trở lại trang giỏ hàng sau khi xóa
        header('Location: index.php?controller=cart&action=cart');
        exit;
    }
    public function update_quantity() {
        session_start();

        // Kiểm tra xem yêu cầu có phải là POST không
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy product_id và quantity từ yêu cầu POST
            $product_id = $_POST['product_id'];
            $quantity = $_POST['quantity'];

            // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng không
            if (isset($_SESSION['cart'][$product_id])) {
                // Lấy số lượng tồn kho của sản phẩm từ cơ sở dữ liệu
                $productQuantity = Product::getProductQuantity($product_id);

                // Đảm bảo quantity là một số nguyên dương
                $quantity = intval($quantity);
                if ($quantity > 0 && $quantity <= $productQuantity) {
                    // Cập nhật số lượng sản phẩm trong giỏ hàng
                    $_SESSION['cart'][$product_id]->quantity = $quantity;
                }
            }
        }
        // Chuyển hướng người dùng trở lại trang giỏ hàng sau khi cập nhật
        header('Location: index.php?controller=cart&action=cart');
        exit;
    }
}
?>
