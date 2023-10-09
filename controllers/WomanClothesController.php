<?php
require_once('controllers/BaseController.php');
require_once('models/product.php');
class WomanClothesController extends BaseController
{
    function __construct()
    {
        $this->folder = 'woman_clothes';
    }
    public function woman_clothes(){
        $woman_clothes = Product::showWoManClothes();
        $data = array('woman_clothes' => $woman_clothes);
        $this->render('woman_clothes', $data);
    }
}