
<style>
    .cart_bt_1 form{
        width: 100%;
        float: left;
        font-size: 14px;
        color: #ffffff;
        background-color: #ff5d68;
        text-align: center;
        padding: 8px 4px;
    }
    .cart_bt_1 button{
        width: 100%;
        float: left;
        font-size: 14px;
        color: #ffffff;
        background-color: #ff5d68;
        text-align: center;
        padding: 8px 4px;
    }
    /* CSS cho form khi hover */
    .cart_bt_1 form:hover {
        background-color: #BBBBBB; /* Màu nền thay đổi khi hover */
    }

    /* CSS cho nút khi hover */
    .cart_bt_1 button:hover {
        background-color: #BBBBBB; /* Màu nền thay đổi khi hover */
        cursor: pointer; /* Biểu tượng con trỏ khi hover */
    }
</style>
<div class="mans_section layout_padding">
    <div class="container">
        <h1 class="computers_taital">Woman’s clothes</h1>
    </div>
</div>

<!-- womans clothes section start -->
<div class="computers_section_2">
    <div class="container-fluid">
        <div class="computer_main">
            <div class="row">
                <?php foreach ($woman_clothes as $woman): ?>
                    <div class="col-md-4">
                        <div class="computer_img">
                            <!-- Thêm đường dẫn đến trang chi tiết sản phẩm -->
                            <a href="index.php?controller=product_detail&action=product_detail&idSP=<?php echo $woman->idSP; ?>">
                                <img src="/hl/asset/images/<?php echo $woman->img; ?>">
                            </a>
                        </div>
                        <h4 class="computer_text">
                            <!-- Thêm đường dẫn đến trang chi tiết sản phẩm -->
                            <a href="index.php?controller=product_detail&action=product_detail&idSP=<?php echo $woman->idSP; ?>">
                                <?php echo $woman->name; ?>
                            </a>
                        </h4>
                        <div class="computer_text_main">
                            <h4 class="dell_text">
                                <?php echo "Còn lại: " . $woman->quantity; ?>
                            </h4>
                            <h6 class="price_text">
                                <?php echo "Giá: " . number_format($woman->price) . " VNĐ"; ?>
                            </h6>
                        </div>
                        <div class="cart_bt_1"><a href="index.php?controller=cart&action=cart&idSP=<?php echo $woman->idSP; ?>">Add To Cart</a></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<!-- womans clothes section end -->