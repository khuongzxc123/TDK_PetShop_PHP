<?php
require_once('configs/database.php');
require_once('models/Product.php');
require_once('controllers/ImageController.php');
class ProductController
{
  private $model;
  function __construct()
  {
    global $pdo;
    $this->model = new Product($pdo);
    $this->img = new ImageController();
  }

  function themsanpham()
  {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $loai = $_POST['loai'];
      $name = $_POST['name'];
      $gia = $_POST['gia'];
      $donvi = $_POST['donvi'];
      $newImageName = $this->img->uploadImage($_FILES["image"], 'assets/img/products/');
      $this->model->addProduct($name, $gia, $newImageName, $donvi, $loai);
      echo "<script>alert('Thêm sản phẩm thành công');</script>";
      Header("Refresh: 0; url='?r=danhsachsanpham'");
    } else {
      $category = $this->model->getAllCategory();
      require_once('views/product/themsanpham.php');
    }
  }
  function danhsachsanpham()
  {
    $danhSachSanPham = $this->model->getAllProduct();
    require_once('views/product/danhsachsanpham.php');
  }
  function editsanpham()
  {
    $category = $this->model->getAllCategory();
    $Id = $_GET['id'];
    if (isset($Id)) {
      $product = $this->model->find($Id);
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $Category = $_POST['loai'];
        $Name = $_POST['name'];
        $Unit = $_POST['unit'];
        $Price = $_POST['price'];
        $filename = "assets/img/products/" . $product['Image'];
        if ($_FILES["image"]["size"] != 0) {
          $newImageName = $this->img->uploadImage($_FILES["image"], 'assets/img/products/');
          $isUpdate = $this->model->editProduct($Id, $newImageName, $Name, $Unit, $Price);
          if ($isUpdate) {
            if (file_exists($filename)) {
              unlink($filename);
            }
            header('Location: ?r=danhsachsanpham');
          } else {
            echo "ERROR UPDATE PRODUCT!!";
          }
        } else {
          $isUpdate = $this->model->editProduct($Id, $product['Image'], $Name, $Unit, $Price);
          if ($isUpdate) {
            header('Location: ?r=danhsachsanpham');
          } else {
            echo "ERROR UPDATE PRODUCT!!";
          }
        }
      } else {
        require_once('views/product/editproduct.php');
      }

    } else {
      echo "NOT FOUND!!!";
    }
  }

  function listcategory()
  {
    $category = $this->model->getAllCategory();
    require_once('views/product/categorylist.php');
  }

  function addcategory()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $name = $_POST['name'];
      $isAdd = $this->model->addCategory($name);
      if ($isAdd) {
        echo "<script>alert('Thêm loại sản phẩm thành công');</script>";
        Header("Refresh: 0; url='?r=listcategory'");
      } else {
        echo "<script>alert('Thêm loại sản phẩm thất bại');</script>";
        Header("Refresh: 0; url='?r=addcategory'");
      }
    } else {
      require_once('views/product/addcategory.php');
    }
  }

  function editCategory()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $id = $_GET['id'];
      $name = $_POST['loai'];
      $isUpdate = $this->model->editCategory($id, $name);
      if ($isUpdate) {
        echo "<script>alert('Edit sản phẩm thành công');</script>";
        Header("Refresh: 0; url='?r=listcategory'");
      } else {
        echo "<script>alert('Thêm loại sản phẩm thất bại');</script>";
        Header("Refresh: 0; url='?r=addcategory'");
      }
    } else {
      $id = $_GET['id'];
      $category = $this->model->findCategory($id);
      require_once('views/product/editcategory.php');
    }
  }
}
?>