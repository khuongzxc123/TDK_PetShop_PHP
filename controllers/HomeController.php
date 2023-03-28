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
        $category = $this->model->getAllCategory();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['loai']) && $_POST['loai'] != "-1") {
                $loai = $_POST['loai'];
                $getcategory = $this->model->findCategory($loai);
                $sanPham = $this->model->getAllProductCategory($loai);
                require_once('views/home.php');
            } else {
                $sanPham = $this->model->getAllProduct();
                require_once('views/home.php');
            }
        } else {
            $sanPham = $this->model->getAllProduct();
            require_once('views/home.php');
        }

    }
}
?>