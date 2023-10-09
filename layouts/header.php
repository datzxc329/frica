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
        <link rel="stylesheet" href="/hl/asset/css/owl.carousel.min.css">
        <link rel="stylesheet" href="/hl/asset/css/owl.theme.default.min.css">
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
            body, input {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 12px;
            }

            #searchs {
                list-style-type: none;
                margin: 0;
                padding: 0;
                width: 200px;
            }

            #searchs li {
                padding: 10px;
                background: #FFF;
                border-bottom: #F0F0F0 1px solid;
            }

            #searchs li:hover {
                background:#F0F0F0;
                cursor: pointer;
                cursor: hand;
            }

            #search {
                padding: 10px;
            }

        </style>

    </head>
    <body>
    <?= @$content ?>
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
                            <li><a href="/hl/index.php?controller=accounts&action=login"><img src="/hl/asset/images/user-icon.png"></a></li>
                            <li><a href="/hl/index.php?controller=cart&action=cart"><img src="/hl/asset/images/trolly-icon.png"></a></li>
                            <li>
                                <a href="javascript:void(0);" onclick="toggleSearch()">
                                    <img src="/hl/asset/images/search-icon.png">
                                </a>
                            </li>
                        </ul>
                        <div class="search-form" id="searchForm">
                            <input type="text" name="query" id="search" placeholder="Tìm kiếm...">
                            <input type="hidden" name="controller" value="search">
                            <input type="hidden" name="action" value="search">
                            <button type="submit"><img src="/hl/asset/images/search-icon.png"></button>
                        </div>
                        <div id="suggestions"></div>
                    </div>

                </form>
        </div>
        <script>

            $(function(){
                $("#search").keyup(function(){
                    var searchName = $(this).val();
                    $.ajax({
                        method: "POST",
                        url: "getCountry.php",
                        data:{search:searchName}
                    })
                    .done(function(data){
                            $("#suggestions").show();
                            $("#suggestions").html(data);
                    });
                });
            });

            var searchForm = document.getElementById('searchForm');
            function toggleSearch() {
                if (searchForm.style.display === 'block') {
                    searchForm.style.display = 'none';
                } else {
                    searchForm.style.display = 'block';
                }
            }

            var suggestions = ['computers', 'laptop hp'];
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


<?php

require_once("models/product.php");
require_once("models/category.php");

if (!empty($_POST['search'])) {
    $query = "SELECT * FROM countries WHERE country LIKE '" . $_POST['country'] . "%' ORDER BY country";
    $result = $db->query($query);
    if (!empty($result)) {
        echo "<ul id='countries'>";
        foreach ($result as $country) {
            echo "<li>" . $country['country'] . "</li>";
        }
        echo "</ul>";
    }
}
?>