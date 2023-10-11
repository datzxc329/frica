<?php
session_start();
require_once('controllers/BaseController.php');
require_once('models/product.php');

class IndexController extends BaseController{
    function __construct()
    {
        $this->folder = 'index';
    }
    public function index(){
        $allProducts = Product::showProducts();
        $data = array('allProducts' => $allProducts);
        $this->render('index', $data);
    }

}

