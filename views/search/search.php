
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<?php
?>
<div class="computers_section layout_padding">
    <div class="container">
        <h1 class="computers_taital">Kết quả tìm kiếm</h1>
    </div>
</div>
<div class="computers_section_2">
    <div class="container-fluid">
        <div class="computer_main">
            <div class="row">
                <!--Chuyển từ cách làm đối tượng thành mảng
                Cách 2: -->
                <?php /*print_r($searchProducts);  die("faga");*/?>
                <?php foreach ($searchProducts as $searchProduct): ?>
<!--                --><?php //print_r($searchProduct) ?>
                    <div class="col-md-4">
                        <div class="computer_img"><img src="/hl/asset/images/<?php echo $searchProduct['img']; ?>"></div>
                        <h4 class="computer_text"><?php echo $searchProduct['name']; ?></h4>
                        <div class="computer_text_main">
                            <h4 class="dell_text"><?php echo "Còn lại: " . $searchProduct['quantity']; ?></h4>
                            <h6 class="price_text"><?php echo "Giá: " . $searchProduct['price']; ?>VNĐ</h6>
                            <!-- Thêm các thông tin khác của sản phẩm -->
                        </div>
                        <div class="cart_bt_1"><a href="index.php?controller=cart&action=cart&idSP=<?php echo $searchProduct['idSP']; ?>">Add To Cart</a></div>
                    </div>
                <?php endforeach; ?>
<!--                --><?php //print_r($searchProducts);  die("faga");?>
                <?php foreach ($searchCategories as $searchCategory): ?>
<!--                    --><?php //print_r($searchCategories) ?>
                    <div class="col-md-4">
                        <div class="computer_img"><img src="/hl/asset/images/<?php echo $searchCategory['img']; ?>"></div>
                        <h4 class="computer_text"><?php echo $searchCategory['name']; ?></h4>
                        <div class="computer_text_main">
                            <h4 class="dell_text"><?php echo "Còn lại: " . $searchCategory['quantity']; ?></h4>
                            <h6 class="price_text"><?php echo "Giá: " . $searchCategory['price']; ?>VNĐ</h6>
                            <!-- Thêm các thông tin khác của sản phẩm -->
                        </div>
                        <div class="cart_bt_1"><a href="index.php?controller=cart&action=cart&idSP=<?php echo $searchCategory['idSP']; ?>">Add To Cart</a></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>



