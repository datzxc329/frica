<?php
require_once('controllers/BaseController.php');
require_once('models/product.php');
class OtherProductsController extends BaseController
{
    function __construct()
    {
        $this->folder = 'other_products';
    }
    public function other_products(){
        $other_products = Product::showOtherProducts();
        $data = array('other_products' => $other_products);
        $this->render('other_products', $data);
    }
}