
<!--file template chung-->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Frica</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="/hl/asset/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="/hl/asset/css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="/hl/asset/css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="/hl/asset/images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="/hl/asset/css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="/asset/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/asset/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <style>
        .search-form {
            display: none; /* Ẩn thanh tìm kiếm ban đầu */
            position: absolute;
            top: 40px; /* Điều chỉnh khoảng cách từ đỉnh thanh điều hướng */
            right: 0;
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 10px;
            z-index: 1;
        }
        .search-icon {
            width: 24px; /* Độ rộng của biểu tượng */
            height: 24px; /* Độ cao của biểu tượng */
            transition: background-color 0.3s ease; /* Hiệu ứng màu nền */
        }
        #accountForm {
            display: none;
            position: absolute;
            top: 40px; /* Điều chỉnh khoảng cách từ biểu tượng người dùng xuống form */
            right: 0;
            background-color: #fff; /* Màu nền cho form */
            border: 1px solid #ccc; /* Viền */
            padding: 10px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2); /* Hiệu ứng bóng đổ */
        }
        #accountForm p {
            font-size: 16px;
            color: #333; /* Màu chữ cho nội dung */
            margin-bottom: 10px;
        }
        #accountForm button {
            background-color: #007bff; /* Màu nền cho nút */
            color: #fff; /* Màu chữ cho nút */
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
        #accountForm button:hover {
            background-color: #0056b3; /* Màu nền khi hover */
        }
    </style>
</head>
<body>
<!-- header section start -->
<div class="header_section haeder_main">
    <div class="container-fluid">
        <nav class="navbar navbar-light bg-light justify-content-between">
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="/hl/index.php">Home</a>
                <a href="/hl/index.php?controller=computers&action=computers">Computers</a>
                <a href="/hl/index.php?controller=man_clothes&action=man_clothes">Mans Clothes</a>
                <a href="/hl/index.php?controller=woman_clothes&action=woman_clothes">Womans Clothes</a>
                <a href="/hl/index.php?controller=contact&action=contact">Contact</a>
            </div>
            <span style="font-size:30px;cursor:pointer; color: #fff;" onclick="openNav()"><img src="/hl/asset/images/toggle-icon.png"></span>
            <a class="navbar-brand" href="index.php"><img src="/hl/asset/images/logo.png" alt=""></a>

            <form class="form-inline" action="/hl/index.php" method="GET" > <!--/hl/index.php giống details.php project kia - không chỉnh sửa-->
                <div class="login_text">
                    <ul>
                        <!--<li><a href="/hl/index.php?controller=accounts&action=login"><img src="/hl/asset/images/user-icon.png"></a></li>-->
                        <?php
                        if (!isset($_SESSION['user'])) {
                            echo '<li><a href="/hl/index.php?controller=accounts&action=login"><img src="/hl/asset/images/user-icon.png"></a></li>';
                        } else {
                            echo '
                                <li>
                                    <a href="javascript:void(0);" onclick="account()">
                                        <img src="/hl/asset/images/user-icon.png">
                                    </a>
                                </li>
                                <div id="accountForm" style="display: none;">
                                    <p>Xin chào, <span id="username">' . $_SESSION['user']['username'] . '</span>!</p>
                                    <button onclick="performLogout()">Đăng xuất</button>
                                    <button onclick="performProfile()">Thông tin cá nhân</button><!-- Thay đổi thành thẻ button -->
                                </div>';
                        }
                        ?>
                        <li><a href="/hl/index.php?controller=cart&action=cart"><img src="/hl/asset/images/trolly-icon.png"></a></li>
                        <li>
                            <a href="javascript:void(0);" onclick="toggleSearch()">
                                <img src="/hl/asset/images/search-icon.png">
                            </a>
                        </li>
                    </ul>
                    <div class="search-form" id="searchForm">
                        <input type="text" name="query" id="search-box" placeholder="Tìm kiếm...">
                        <input type="hidden" name="controller" value="search">
                        <input type="hidden" name="action" value="search">
                        <button type="submit"><img src="/hl/asset/images/search-icon.png"></button>
                    </div>
                    <div id="suggestions-box"></div>
                </div>

            </form>
    </div>
    <script>
        var searchForm = document.getElementById('searchForm');
        function toggleSearch() {
            if (searchForm.style.display === 'block') {
                searchForm.style.display = 'none';
            } else {
                searchForm.style.display = 'block';
            }
        }

        $(document).ready(function() {
            $("#search-box").keyup(function(){
                var searchQuery = $(this).val();
                $.ajax({
                    method: "POST",
                    url: "controllers/SearchController.php", // Replace with the actual script name
                    data: { query: searchQuery }
                })
                    .done(function(data){
                        $("#suggestions-box").html(data);
                    });
            });
        });

        function account() {
            // Hiển thị hoặc ẩn form đăng nhập dựa trên trạng thái hiện tại
            var accountForm = document.getElementById('accountForm');
            if (accountForm.style.display === 'block') {
                accountForm.style.display = 'none';
            } else {
                accountForm.style.display = 'block';
            }
        }
        // function logout() {
        //     window.location.href = 'index.php';
        // }
        function performLogout() {
            fetch('index.php?controller=accounts&action=logout')
                .then(response => {
                    if (response.ok) {
                        // Xử lý khi đăng xuất thành công, ví dụ: chuyển hướng người dùng đến trang khác.
                        window.location.href = 'index.php'; // Điều hướng người dùng đến trang chính sau khi đăng xuất
                    } else {
                        console.error('Đăng xuất thất bại');
                    }
                })
                .catch(error => {
                    console.error('Lỗi khi thực hiện đăng xuất:', error);
                });
        }
        function performProfile() {
            fetch('index.php?controller=accounts&action=profile')
                .then(response => {
                    if (response.ok) {
                        // Xử lý khi đăng xuất thành công, ví dụ: chuyển hướng người dùng đến trang khác.
                        window.location.href = 'index.php'; // Điều hướng người dùng đến trang chính sau khi đăng xuất
                    } else {
                        console.error('Xem thông tin cá nhân thất bại');
                    }
                })
                .catch(error => {
                    console.error('Lỗi khi thực hiện việc xem thông tin cá nhân:', error);
                });
        }
        var suggestions = ['computers', 'laptop hp', 'laptop dell'];
        //var suggestions = <?php //echo json_encode($_SESSION['suggestions']); ?>
        // Lấy tham chiếu đến trường nhập văn bản và hộp gợi ý
        var searchInput = document.getElementById('search-box');
        var suggestionBox = document.getElementById('suggestion-box');
        // Kích hoạt tính năng autocomplete cho trường nhập văn bản
        autocomplete(searchInput, suggestions);

        function autocomplete(inp, arr) {
            /*the autocomplete function takes two arguments,
            the text field element and an array of possible autocompleted values:*/
            var currentFocus;
            /*execute a function when someone writes in the text field:*/
            inp.addEventListener("input", function(e) {
                var a, b, i, val = this.value;
                /*close any already open lists of autocompleted values*/
                closeAllLists();
                if (!val) { return false;}
                currentFocus = -1;
                /*create a DIV element that will contain the items (values):*/
                a = document.createElement("DIV");
                a.setAttribute("id", this.id + "autocomplete-list");
                a.setAttribute("class", "autocomplete-items");
                /*append the DIV element as a child of the autocomplete container:*/
                this.parentNode.appendChild(a);
                /*for each item in the array...*/
                for (i = 0; i < arr.length; i++) {
                    /*check if the item starts with the same letters as the text field value:*/
                    if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                        /*create a DIV element for each matching element:*/
                        b = document.createElement("DIV");
                        /*make the matching letters bold:*/
                        b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                        b.innerHTML += arr[i].substr(val.length);
                        /*insert a input field that will hold the current array item's value:*/
                        b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                        /*execute a function when someone clicks on the item value (DIV element):*/
                        b.addEventListener("click", function(e) {
                            /*insert the value for the autocomplete text field:*/
                            inp.value = this.getElementsByTagName("input")[0].value;
                            /*close the list of autocompleted values,
                            (or any other open lists of autocompleted values:*/
                            closeAllLists();
                        });
                        a.appendChild(b);
                    }
                }
            });
            /*execute a function presses a key on the keyboard:*/
            inp.addEventListener("keydown", function(e) {
                var x = document.getElementById(this.id + "autocomplete-list");
                if (x) x = x.getElementsByTagName("div");
                if (e.keyCode == 40) {
                    /*If the arrow DOWN key is pressed,
                    increase the currentFocus variable:*/
                    currentFocus++;
                    /*and and make the current item more visible:*/
                    addActive(x);
                } else if (e.keyCode == 38) { //up
                    /*If the arrow UP key is pressed,
                    decrease the currentFocus variable:*/
                    currentFocus--;
                    /*and and make the current item more visible:*/
                    addActive(x);
                } else if (e.keyCode == 13) {
                    /*If the ENTER key is pressed, prevent the form from being submitted,*/
                    e.preventDefault();
                    if (currentFocus > -1) {
                        /*and simulate a click on the "active" item:*/
                        if (x) x[currentFocus].click();
                    }
                }
            });
            function addActive(x) {
                /*a function to classify an item as "active":*/
                if (!x) return false;
                /*start by removing the "active" class on all items:*/
                removeActive(x);
                if (currentFocus >= x.length) currentFocus = 0;
                if (currentFocus < 0) currentFocus = (x.length - 1);
                /*add class "autocomplete-active":*/
                x[currentFocus].classList.add("autocomplete-active");
            }
            function removeActive(x) {
                /*a function to remove the "active" class from all autocomplete items:*/
                for (var i = 0; i < x.length; i++) {
                    x[i].classList.remove("autocomplete-active");
                }
            }
            function closeAllLists(elmnt) {
                /*close all autocomplete lists in the document,
                except the one passed as an argument:*/
                var x = document.getElementsByClassName("autocomplete-items");
                for (var i = 0; i < x.length; i++) {
                    if (elmnt != x[i] && elmnt != inp) {
                        x[i].parentNode.removeChild(x[i]);
                    }
                }
            }
            /*execute a function when someone clicks in the document:*/
            document.addEventListener("click", function (e) {
                closeAllLists(e.target);
            });
        }

    </script>

</body>
</html>

<!-- header section end -->

<?php echo $content; ?>

<!-- footer section start -->
<div class="footer_section layout_padding margin_top_90">
    <div class="container">
        <div class="footer_logo_main">
            <div class="footer_logo"><a href="/views/index/index.php"><img src="/hl/asset/images/footer-logo.png"></a></div>
            <div class="social_icon">
                <ul>
                    <li><a href="http://www.facebook.com"><img src="/hl/asset/images/fb-icon.png"></a></li>
                    <li><a href="http://www.twitter.com"><img src="/hl/asset/images/twitter-icon.png"></a></li>
                    <li><a href="http://www.linkedin.com"><img src="/hl/asset/images/linkedin-icon.png"></a></li>
                    <li><a href="http://www.instagram.com"><img src="/hl/asset/images/instagram-icon.png"></a></li>
                    <li><a href="http://www.youtube.com"><img src="/hl/asset/images/youtub-icon.png"></a></li>
                </ul>
            </div>
        </div>
        <div class="footer_section_2">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <h4 class="adderss_text">About</h4>
                    <p class="ipsum_text">consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation u</p>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <h4 class="adderss_text">Menu</h4>
                    <div class="footer_menu">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="/hl/index.php?controller=computers&action=computers">Computers</a></li>
                            <li><a href="/hl/index.php?controller=man_clothes&action=man_clothes">Man Clothes</a></li>
                            <li><a href="/hl/index.php?controller=woman_clothes&action=woman_clothes">Woman Clothes</a></li>
                            <li><a href="/hl/index.php?controller=contact&action=contact">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <h4 class="adderss_text">Useful Link</h4>
                    <div class="footer_menu">
                        <ul>
                            <li><a href="#">Adipiscing</a></li>
                            <li><a href="#">Elit, sed do</a></li>
                            <li><a href="#">Eiusmod</a></li>
                            <li><a href="#">Tempor</a></li>
                            <li><a href="#">incididunt</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <h4 class="adderss_text">Contact</h4>
                    <div class="call_text"><img src="/hl/asset/images/map-icon.png"><span class="paddlin_left_0"><a href="#">London 145 United Kingdom</a></span></div>
                    <div class="call_text"><img src="/hl/asset/images/call-icon.png"><span class="paddlin_left_0"><a href="#">+7586656566</a></span></div>
                    <div class="call_text"><img src="/hl/asset/images/mail-icon.png"><span class="paddlin_left_0"><a href="#">volim@gmail.com</a></span></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer section end -->
<!-- copyright section start -->
<div class="copyright_section">
    <div class="container">
        <p class="copyright_text">2020 All Rights Reserved. Design by <a href="https://html.design">Free html  Templates</a></p>
    </div>
</div>
<!-- copyright section end -->
<!-- Javascript files-->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script src="/hl/asset/js/jquery.min.js"></script>
<script src="/hl/asset/js/popper.min.js"></script>
<script src="/hl/asset/js/bootstrap.bundle.min.js"></script>
<script src="/hl/asset/js/jquery-3.0.0.min.js"></script>


<!-- sidebar -->
<script src="/hl/asset/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="/hl/asset/js/custom.js"></script>
<!-- javascript -->
<script src="/hl/asset/js/owl.carousel.js"></script>

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "100%";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>
