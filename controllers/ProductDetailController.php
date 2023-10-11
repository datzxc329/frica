<?php
require_once('controllers/BaseController.php');
require_once('models/product.php');
class ProductDetailController extends BaseController
{
    function __construct()
    {
        $this->folder = 'product_detail';
    }
    public function product_detail(){

        if (isset($_GET['idSP'])) {
            $productId = $_GET['idSP'];
            $productDetail = Product::getProductDetailById($productId); // Hãy thay thế hàm này bằng hàm thích hợp của bạn
            if ($productDetail) {
                echo '<p><a href="index.php">Quay lại trang chủ</a></p>';
                echo '<h1>Tên: ' . $productDetail['name'] . '</h1>';
                echo '<p>Số lượng: ' . $productDetail['quantity'] . '</p>';
                echo '<p>Mô tả: ' . $productDetail['description'] . '</p>';
                echo '<p>Giá: ' . number_format($productDetail['price']) . ' VNĐ</p>';
                echo '<p>Thông tin khác:auhfiwojggjapajpgjpagkpakgpag </p>';
                echo '<div class="cart_bt_1"><a href="index.php?controller=cart&action=cart&idSP=' . $_GET['idSP'] . '">Add To Cart<br><br></a>';
                echo '<img src="/hl/asset/images/' . $productDetail['img'] . '">';
            } else {
                echo 'Sản phẩm không tồn tại.';
            }
        } else {
            echo 'ID sản phẩm không hợp lệ.';
        }
    }
}