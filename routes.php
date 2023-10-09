<?php
$controllers = array(
    'contact' => ['contact', 'thanks'],
    'index' => ['index'],
    'computers' => ['computers'],
    'man_clothes' => ['man_clothes'],
    'woman_clothes' => ['woman_clothes'],
    'accounts' => ['login', 'signup', 'forgotpassword', 'successlogin', 'successsignup', 'successchangepw'],
    'search' => ['search', 'autocomplete'],
    'cart' => ['cart','delete', 'update_quantity'],
    'admin' => [''],
    'payments' => ['payments', 'success'],
    'other_products' => ['other_products'],
);

include_once ('controllers/' . str_replace('_', '', ucwords($controller, '_')) . 'Controller.php');
$klass = str_replace('_', '', ucwords($controller, '_')).'Controller';
$controller = new $klass;
$controller->$action();

//Dưới đây là cách nó hoạt động:
//
//$controller là một chuỗi chứa có thể chứa dấu gạch dưới (ví dụ: "mans_clothes").
//ucwords($controller, '_') áp dụng hàm ucwords cho chuỗi $controller, và cho biết dấu gạch dưới _ được coi là dấu phân cách từ. Vì vậy, nó chuyển đổi "mans_clothes" thành "Mans_Clothes".
//str_replace('_', '', ...) loại bỏ các dấu gạch dưới khỏi chuỗi "Mans_Clothes", kết quả là "MansClothes".
//Cuối cùng, "MansClothesController" được nối vào cuối để tạo ra tên lớp bạn muốn tạo ra.
//Vì vậy, đoạn mã này lấy tên của một controller như "mans_clothes" và chuyển đổi nó thành tên lớp tương ứng "MansClothesController" bằng cách viết hoa chữ cái đầu tiên của mỗi từ và loại bỏ các dấu gạch dưới.