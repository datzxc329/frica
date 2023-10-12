
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
     .pagination {
         display: flex;
         justify-content: center;
         align-items: center;
         margin-top: 20px;
         text-align: center;
     }
    .pagination a {
        display: inline-block;
        margin: 5px;
        padding: 5px 10px;
        background-color: #007BFF;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
    }
    .pagination a:hover {
        background-color: #0056b3;
    }
    .current-page {
        display: inline-block;
        margin: 5px;
        padding: 5px 10px;
        background-color: #0056b3;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
    }
</style>
<div class="mans_section layout_padding">
    <div class="container">
        <h1 class="computers_taital">Woman’s clothes</h1>
    </div>
</div>
<?php
$totalProducts = count($woman_clothes);
$productsPerPage = 6;
$totalPages = ceil($totalProducts / $productsPerPage);
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($current_page - 1) * $productsPerPage;
$productsForCurrentPage = array_slice($woman_clothes, $offset, $productsPerPage);
?>
<!-- womans clothes section start -->
<div class="computers_section_2">
    <div class="container-fluid">
        <div class="computer_main">
            <div class="row">
                <?php foreach ($productsForCurrentPage as $woman): ?>
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
                <div class="pagination">
                    <?php if ($totalPages > 1): ?>
                        <?php if ($current_page > 1): ?>
                            <a href="?controller=woman_clothes&action=woman_clothes&page=<?php echo $current_page - 1; ?>">Previous</a>
                        <?php endif; ?>
                        <?php for ($page = 1; $page <= $totalPages; $page++): ?>
                            <?php if ($page == $current_page): ?>
                                <span class="current-page"><?php echo $page; ?></span>
                            <?php else: ?>
                                <a href="?controller=woman_clothes&action=woman_clothes&page=<?php echo $page; ?>"><?php echo $page; ?></a>
                            <?php endif; ?>
                        <?php endfor; ?>
                        <?php if ($current_page < $totalPages): ?>
                            <a href="?controller=woman_clothes&action=woman_clothes&page=<?php echo $current_page + 1; ?>">Next</a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- womans clothes section end -->