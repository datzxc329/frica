<?php
require_once('controllers/BaseController.php');
require_once('models/product.php');
class ComputersController extends BaseController
{
    function __construct()
    {
        $this->folder = 'computers';
    }
    public function computers(){
        $computers = Product::showComputers();
        $data = array('computers' => $computers);
        $this->render('computers', $data);
    }
}

