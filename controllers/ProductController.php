<?php
require_once('configs/database.php');
require_once('models/Product.php');
require_once('controllers/ImageController.php');
class ProductController{
    private $model;
    function __construct(){
        global $pdo;
       $this->model = new Product($pdo);
       $this->img = new ImageController();
    }

    function themsanpham(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $gia = $_POST['gia'];
        $newImageName = $this->img->uploadImage($_FILES["image"], 'assets/img/products/');
        $this->model->addProduct($name, $gia, $newImageName);
        echo "<script>alert('Thêm sản phẩm thành công');</script>";
        Header("Refresh: 0; url='?r=danhsachsanpham'");
      }
      else{
        require_once('views/product/themsanpham.php');
      }
    } 
    function danhsachsanpham(){
        $danhSachSanPham = $this->model->getAllProduct();
        require_once('views/product/danhsachsanpham.php');
    }  
}
?>
