<?php
//echo "Document Root: " . $_SERVER['DOCUMENT_ROOT'];
require_once ('models/connection.php');
if(isset($_GET['controller'])){
    $controller = $_GET['controller'];
    if (isset($_GET['action'])){
        $action = $_GET['action'];
    }else{
        $action = 'index';
    }
}else{
    $controller='index';
    $action='index';
}
require_once ('routes.php');