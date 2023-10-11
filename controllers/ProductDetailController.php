<?php
require_once('controllers/BaseController.php');
require_once('models/product.php');
class ProductDetailController extends BaseController
{
    function __construct()
    {
        $this->folder = 'product_detail';
    }
    public function product_detail(){

        $this->render('product_detail');
    }
}