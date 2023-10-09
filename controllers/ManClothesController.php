<?php
require_once('controllers/BaseController.php');
require_once('models/product.php');
class ManClothesController extends BaseController
{
    function __construct()
    {
        $this->folder = 'man_clothes';
    }
    public function man_clothes(){
        $man_clothes = Product::showManClothes();
        $data = array('man_clothes' => $man_clothes);
        $this->render('man_clothes', $data);
    }
}