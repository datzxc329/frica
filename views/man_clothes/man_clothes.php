<!-- mans clothes section start -->
<div class="mans_section layout_padding">
    <div class="container">
        <h1 class="computers_taital">Man’s clothes</h1>
    </div>
</div>
<div class="computers_section_2">
    <div class="container-fluid">
        <div class="computer_main">
            <div class="row">
                <?php foreach ($man_clothes as $man): ?>
                    <div class="col-md-4">
                        <div class="computer_img"><img src="/hl/asset/images/<?php echo $man->img; ?>"></div>
                        <h4 class="computer_text"><?php echo $man->name; ?></h4>
                        <div class="computer_text_main">
                            <h4 class="dell_text"><?php echo "Còn lại: " . $man->quantity; ?></h4>
                            <h6 class="price_text"><?php echo "Giá: " . $man->price; ?>VNĐ</h6>
                            <!-- Thêm các thông tin khác của sản phẩm -->
                        </div>
                        <div class="cart_bt_1">
                            <a href="index.php?controller=cart&action=cart&idSP=<?php echo $man->idSP; ?>">Add To Cart</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<!-- mans clothes section end -->
