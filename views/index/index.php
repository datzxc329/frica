
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
<div class="container">
    <br>
    <div id="my_slider" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#my_slider" data-slide-to="0" class="active"></li>
            <li data-target="#my_slider" data-slide-to="1"></li>
            <li data-target="#my_slider" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <div class="container border_1">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="image_1"><img src="/hl/asset/images/img-1.png" style="width:100%"></div>
                        </div>
                        <div class="col-md-4">
                            <h1 class="banner_taital">Big Sale Offer</h1>
                            <div class="buynow_bt active"><a href="index.php?controller=woman_clothes&action=woman_clothes">Buy Now</a></div>
                            <div class="contact_bt"><a href="index.php?controller=contact&action=contact">Contact Us</a></div>
                        </div>
                        <div class="col-md-4">
                            <div class="image_2"><img src="/hl/asset/images/img-2.png" style="width:100%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="container border_1">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="image_1"><img src="/hl/asset/images/img-1.png" style="width:100%"></div>
                        </div>
                        <div class="col-md-4">
                            <h1 class="banner_taital">Big ttqyg Offer</h1>
                            <div class="buynow_bt active"><a href="index.php?controller=woman_clothes&action=woman_clothes">Buy Now</a></div>
                            <div class="contact_bt"><a href="index.php?controller=contact&action=contact">Contact Us</a></div>
                        </div>
                        <div class="col-md-4">
                            <div class="image_2"><img src="/hl/asset/images/img-2.png" style="width:100%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="container border_1">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="image_1"><img src="/hl/asset/images/img-1.png" style="width:100%"></div>
                        </div>
                        <div class="col-md-4">
                            <h1 class="banner_taital">Big aesgeag Offer</h1>
                            <div class="buynow_bt active"><a href="index.php?controller=woman_clothes&action=woman_clothes">Buy Now</a></div>
                            <div class="contact_bt"><a href="index.php?controller=contact&action=contact">Contact Us</a></div>
                        </div>
                        <div class="col-md-4">
                            <div class="image_2"><img src="/hl/asset/images/img-2.png" style="width:100%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#my_slider" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#my_slider" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<!-- banner section end -->
<!-- catagary section start -->

<div class="catagary_section layout_padding">
    <div class="container">
        <div class="catagary_main">
            <div class="catagary_left">
                <h2 class="categary_text">Category</h2>
            </div>
            <div class="catagary_right">
                <div class="catagary_menu">
                    <ul>
                        <li><a href="index.php?controller=man_clothes&action=man_clothes">Man's Fashion</a></li>
                        <li><a href="index.php?controller=woman_clothes&action=woman_clothes">Woman Fashion</a></li>
                        <li><a href="index.php?controller=other_products&action=other_products">Mobiles</a></li>
                        <li><a href="index.php?controller=computers&action=computers">Computers</a></li>
                        <li><a href="index.php?controller=other_products&action=other_products">Watches</a></li>
                        <li><a href="index.php?controller=other_products&action=other_products">Kitchen</a></li>
                        <li><a href="index.php?controller=other_products&action=other_products">Sports</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- catagary section end -->
<!-- all product start -->
<div class="computers_section layout_padding">
    <div class="container">
        <h1 class="computers_taital">All product</h1>
    </div>
</div>
<?php
$totalProducts = count($allProducts);
$productsPerPage = 6;
$totalPages = ceil($totalProducts / $productsPerPage);
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($current_page - 1) * $productsPerPage;
$productsForCurrentPage = array_slice($allProducts, $offset, $productsPerPage);
?>
<div class="computers_section_2">
    <div class="container-fluid">
        <div class="computer_main">
            <div class="row">
                <?php foreach ($productsForCurrentPage as $allProduct): ?>
                    <div class="col-md-4">
                        <div class="computer_img">
                            <!-- Thêm đường dẫn đến trang chi tiết sản phẩm -->
                            <a href="index.php?controller=product_detail&action=product_detail&idSP=<?php echo $allProduct->idSP; ?>">
                                <img src="/hl/asset/images/<?php echo $allProduct->img; ?>">
                            </a>
                        </div>
                        <h4 class="computer_text">
                            <!-- Thêm đường dẫn đến trang chi tiết sản phẩm -->
                            <a href="index.php?controller=product_detail&action=product_detail&idSP=<?php echo $allProduct->idSP; ?>">
                                <?php echo $allProduct->name; ?>
                            </a>
                        </h4>
                        <div class="computer_text_main">
                            <h4 class="dell_text">
                                <?php echo "Còn lại: " . $allProduct->quantity; ?>
                            </h4>
                            <h6 class="price_text">
                                <?php echo "Giá: " . number_format($allProduct->price) . " VNĐ"; ?>
                            </h6>
                        </div>
                        <!--<div class="cart_bt_1"><a href="index.php?controller=cart&action=cart&idSP=<?php /*echo $allProduct->idSP; */?>">Add To Cart</a></div>-->
                        <?php if ($allProduct->quantity > 0) : ?>
                            <div class="cart_bt_1">
                                <a href="index.php?controller=cart&action=cart&idSP=<?php echo $allProduct->idSP; ?>">Add To Cart</a>
                            </div>
                        <?php else : ?>
                            <div class="cart_bt_1">
                                <span>Đã hết hàng</span>
                            </div>
                        <?php endif; ?>


                    </div>
                <?php endforeach; ?>
            </div>
            <div class="pagination">
                <?php if ($totalPages > 1): ?>
                    <?php if ($current_page > 1): ?>
                        <a href="?page=<?php echo $current_page - 1; ?>">Previous</a>
                    <?php endif; ?>
                    <?php for ($page = 1; $page <= $totalPages; $page++): ?>
                        <?php if ($page == $current_page): ?>
                            <span class="current-page"><?php echo $page; ?></span>
                        <?php else: ?>
                            <a href="?page=<?php echo $page; ?>"><?php echo $page; ?></a>
                        <?php endif; ?>
                    <?php endfor; ?>
                    <?php if ($current_page < $totalPages): ?>
                        <a href="?page=<?php echo $current_page + 1; ?>">Next</a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- all product end -->
<div class="computers_section layout_padding">
    <div class="container">
        <h1 class="computers_taital">Watch, Mobile and Camera</h1>
    </div>
</div>
<div class="computers_section_2">
    <div class="container-fluid">
        <div class="computer_main">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="offer_text">Best Offer</h1>
                    <p class="lorem_text">Many good and cheap watch, mobile, camera here</p>
                    <div class="read_bt"><a href="index.php?controller=other_products&action=other_products">Buy Now</a></div>
                </div>
                <div class="col-md-6">
                    <div class="image_2"><img src="/hl/asset/images/mobile-img.png"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- computers section start -->
<div class="computers_section layout_padding">
    <div class="container">
        <h1 class="computers_taital">Computer</h1>
    </div>
</div>
<div class="computers_section_2">
    <div class="container-fluid">
        <div class="computer_main">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="offer_text">Best Offer Computers</h1>
                    <p class="lorem_text">Many good and cheap computers here</p>
                    <div class="read_bt"><a href="index.php?controller=computers&action=computers">Buy Now</a></div>
                </div>
                <div class="col-md-6">
                    <div class="image_2"><img src="/hl/asset/images/img-2.png"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- computers section end -->
<!-- mans clothes section start -->
<div class="mans_section layout_padding">
    <div class="container">
        <h1 class="computers_taital">Man’s clothes</h1>
    </div>
</div>
<div class="mans_section_2">
    <div class="container-fluid">
        <div class="mans_main">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="offer_text">Best  Offer Every Man’s Items</h1>
                    <p class="lorem_text">There are many variations of passages of Lorem Ipsum available,but the majority have</p>
                    <div class="read_bt"><a href="index.php?controller=man_clothes&action=man_clothes">Buy Now</a></div>
                </div>
                <div class="col-md-6">
                    <div class="image_3"><img src="/hl/asset/images/img-3.png"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- mans clothes section end -->
<!-- womans clothes section start -->
<div class="computers_section layout_padding">
    <div class="container">
        <h1 class="womans_taital">Woman’s clothes</h1>
        <div class="womans_section_2">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="Get_offer_text">Get <br>Offer Every Woman Items</h1>
                    <div class="read_bt"><a href="index.php?controller=woman_clothes&action=woman_clothes">Buy Now</a></div>
                </div>
                <div class="col-md-6">
                    <div class="image_4"><img src="/hl/asset/images/img-4.png"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var currentPage = 1;
    var totalPages = 1;
    // JavaScript code
    document.addEventListener("DOMContentLoaded", function () {
        // Khi trang được tải
        loadProducts(1); // Tải sản phẩm cho trang đầu tiên
        // Xử lý sự kiện khi nhấn vào nút Prev
        document.getElementById("prevBtn").addEventListener("click", function (){
           if(currentPage > 1){
               loadProducts(currentPage - 1);
           }
        });
        // Xử lý sự kiện khi nhấn vào nút Next
        document.getElementById("nextBtn").addEventListener("click", function () {
            if (currentPage < totalPages) {
                loadProducts(currentPage + 1);
            }
        });
    });
    function loadProducts(page) {
        // Sử dụng AJAX để tải danh sách sản phẩm cho trang mới
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "index.php?page=" + page, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Nếu thành công, cập nhật danh sách sản phẩm
                document.getElementById("productList").innerHTML = xhr.responseText;
                currentPage = page;
            }
        };
        xhr.send();
    }
    $(document).ready(function() {
        $('#my_slider').carousel();
    });
</script>













<?php
//// Sử dụng các biến $_GET để lấy trang hiện tại và xử lý logic phân trang
//if (isset($_GET['page'])) {
//    $currentPage = intval($_GET['page']);
//} else {
//    $currentPage = 1;
//}
//
//// Xử lý logic phân trang ở đây và trả về danh sách sản phẩm cho trang mới
//$itemsPerPage = 6; // Số sản phẩm trên mỗi trang
//$totalItems = 50; // Tổng số sản phẩm (thay thế bằng số thực tế)
//$totalPages = ceil($totalItems / $itemsPerPage); // Tổng số trang
//
//// Xác định sản phẩm bắt đầu và kết thúc trên trang hiện tại
//$startItem = ($currentPage - 1) * $itemsPerPage;
//$endItem = min($startItem + $itemsPerPage - 1, $totalItems - 1);
//
//// Hiển thị danh sách sản phẩm trên trang mới
//echo '<div class="row">';
//for ($i = $startItem; $i <= $endItem; $i++) {
//    // Hiển thị sản phẩm tại đây, giống như bạn đã làm
//    echo '<div class="col-md-4">';
//    echo '<div class="computer_img">';
//    echo '<a href="index.php?controller=product_detail&action=product_detail&idSP=' . $i . '">';
//    echo '<img src="/hl/asset/images/' . $i . '.jpg">';
//    echo '</a>';
//    echo '</div>';
//    echo '<h4 class="computer_text">';
//    echo '<a href="index.php?controller=product_detail&action=product_detail&idSP=' . $i . '">';
//    echo 'Sản phẩm ' . ($i + 1);
//    echo '</a>';
//    echo '</h4>';
//    echo '</div>';
//}
//echo '</div>';
//
//// Tạo nút Prev (Trang trước)
//if ($currentPage > 1) {
//    echo '<button id="prevBtn">Prev</button>';
//}
//
//// Hiển thị các trang
//echo '<div>';
//for ($i = 1; $i <= $totalPages; $i++) {
//    if ($i == $currentPage) {
//        echo '<span>' . $i . '</span>';
//    } else {
//        echo '<button class="pageBtn" data-page="' . $i . '">' . $i . '</button>';
//    }
//}
//echo '</div>';

