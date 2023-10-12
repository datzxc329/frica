<style>
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
        <h1 class="computers_taital">Watch, mobile, and camera</h1>
    </div>
</div>
<?php
$totalProducts = count($other_products);
$productsPerPage = 6;
$totalPages = ceil($totalProducts / $productsPerPage);
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($current_page - 1) * $productsPerPage;
$productsForCurrentPage = array_slice($other_products, $offset, $productsPerPage);
?>
<div class="computers_section_2">
    <div class="container-fluid">
        <div class="computer_main">
            <div class="row">
                <?php foreach ($productsForCurrentPage as $other_product): ?>
                    <div class="col-md-4">
                        <div class="computer_img">
                            <!-- Thêm đường dẫn đến trang chi tiết sản phẩm -->
                            <a href="index.php?controller=product_detail&action=product_detail&idSP=<?php echo $other_product->idSP; ?>">
                                <img src="/hl/asset/images/<?php echo $other_product->img; ?>">
                            </a>
                        </div>
                        <h4 class="computer_text">
                            <!-- Thêm đường dẫn đến trang chi tiết sản phẩm -->
                            <a href="index.php?controller=product_detail&action=product_detail&idSP=<?php echo $other_product->idSP; ?>">
                                <?php echo $other_product->name; ?>
                            </a>
                        </h4>
                        <div class="computer_text_main">
                            <h4 class="dell_text">
                                <?php echo "Còn lại: " . $other_product->quantity; ?>
                            </h4>
                            <h6 class="price_text">
                                <?php echo "Giá: " . number_format($other_product->price) . " VNĐ"; ?>
                            </h6>
                        </div>
                        <div class="cart_bt_1"><a href="index.php?controller=cart&action=cart&idSP=<?php echo $other_product->idSP; ?>">Add To Cart</a></div>
                    </div>
                <?php endforeach; ?>
                <div class="pagination">
                    <?php if ($totalPages > 1): ?>
                        <?php if ($current_page > 1): ?>
                            <a href="?controller=other_products&action=other_products&page=<?php echo $current_page - 1; ?>">Previous</a>
                        <?php endif; ?>
                        <?php for ($page = 1; $page <= $totalPages; $page++): ?>
                            <?php if ($page == $current_page): ?>
                                <span class="current-page"><?php echo $page; ?></span>
                            <?php else: ?>
                                <a href="?controller=other_products&action=other_products&page=<?php echo $page; ?>"><?php echo $page; ?></a>
                            <?php endif; ?>
                        <?php endfor; ?>
                        <?php if ($current_page < $totalPages): ?>
                            <a href="?controller=other_products&action=other_products&page=<?php echo $current_page + 1; ?>">Next</a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>