<?php
require_once('configs/database.php');
require_once('models/Product.php');
class HomeController
{
    private $model;
    function __construct()
    {
        global $pdo;
        $this->model = new Product($pdo);
    }

    function index()
    {
        $sanPham = $this->model->getAllProduct();
        require_once('views/home.php');
    }


}
?>