<?php
?>
<div class="banner_section layout_padding">
    <div id="my_slider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row border_1">
                        <div class="col-md-4">
                            <div class="image_1"><img src="/hl/asset/images/img-1.png" style="width:100%"></div>
                        </div>
                        <div class="col-md-4">
                            <h1 class="banner_taital">Big Sale Offer</h1>
                            <div class="buynow_bt active"><a href="index.php?controller=computers&action=computers">Buy Now</a></div>
                            <div class="contact_bt"><a href="index.php?controller=contact&action=contact">Contact Us</a></div>
                        </div>
                        <div class="col-md-4">
                            <div class="image_2"><img src="/hl/asset/images/img-2.png" style="width:100%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row border_1">
                        <div class="col-md-4">
                            <div class="image_1"><img src="/hl/asset/images/img-1.png" style="width:100%"></div>
                        </div>
                        <div class="col-md-4">
                            <h1 class="banner_taital">Big Sale Offer</h1>
                            <div class="buynow_bt active"><a href="index.php?controller=man_clothes&action=man_clothes">Buy Now</a></div>
                            <div class="contact_bt"><a href="index.php?controller=contact&action=contact">Contact Us</a></div>
                        </div>
                        <div class="col-md-4">
                            <div class="image_2"><img src="/hl/asset/images/img-2.png" style="width:100%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row border_1">
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
        </div>
        <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
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
                        <li><a href="#">Mobiles</a></li>
                        <li><a href="index.php?controller=computers&action=computers">Computers</a></li>
                        <li><a href="#">Watchs</a></li>
                        <li><a href="#">Kitchen</a></li>
                        <li><a href="#">Sports</a></li>
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
<div class="computers_section_2">
    <div class="container-fluid">
        <div class="computer_main">
            <div class="row">
                <!-- Ở đây là làm với kiểu đối tượng-->
                <?php foreach ($allProducts as $allProduct): ?>
                    <div class="col-md-4">
                        <div class="computer_img"><img src="/hl/asset/images/<?php echo $allProduct->img; ?>"></div>
                        <h4 class="computer_text"><?php echo $allProduct->name; ?></h4>
                        <div class="computer_text_main">
                            <h4 class="dell_text"><?php echo "Còn lại: " . $allProduct->quantity; ?></h4>
                            <h6 class="price_text"><?php echo "Giá: " . $allProduct->price; ?>VNĐ</h6>
                            <!-- Thêm các thông tin khác của sản phẩm -->
                        </div>
                        <div class="cart_bt_1"><a href="index.php?controller=cart&action=cart&idSP=<?php echo $allProduct->idSP; ?>">Add To Cart</a></div>
                    </div>
                <?php endforeach; ?>
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
<!-- womans clothes section end -->

