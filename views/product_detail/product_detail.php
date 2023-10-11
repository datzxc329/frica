<?php
if (isset($_GET['idSP'])) {
    $productId = $_GET['idSP'];
    $productDetail = Product::getProductDetailById($productId); // Hãy thay thế hàm này bằng hàm thích hợp của bạn
    if ($productDetail) { ?>
    <p><a href="index.php">Quay lại trang chủ</a></p>
    <h1>Tên: <?php echo $productDetail['name']; ?></h1>
    <p>Số lượng: <?php echo $productDetail['quantity']; ?></p>
    <p>Mô tả: <?php echo $productDetail['description']; ?></p>
    <p>Giá: <?php echo number_format($productDetail['price']); ?> VNĐ</p>
    <p>Thông tin khác: </p>
    <div class="cart_bt_1">
        <a href="index.php?controller=cart&action=cart&idSP=<?php echo $_GET['idSP']; ?>">Add To Cart</a>
    </div>
    <img src="/hl/asset/images/<?php echo $productDetail['img']; ?>">
<?php
} else {
        echo 'Sản phẩm không tồn tại.';
    }
} else {
    echo 'ID sản phẩm không hợp lệ.';
}


