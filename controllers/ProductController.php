<?php
require_once('configs/database.php');
require_once('models/Product.php');

class ProductController{
    private $model;
    function __construct(){
        global $pdo;
       $this->model = new Product($pdo);
    }

    function themsanpham(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = $_POST['name'];
            $gia = $_POST['gia'];
            if($_FILES["image"]["error"] == 4){
              echo
              "<script> alert('Image Does Not Exist'); </script>"
              ;
            }
            else{
              $fileName = $_FILES["image"]["name"];
              $fileSize = $_FILES["image"]["size"];
              $tmpName = $_FILES["image"]["tmp_name"];
          
              $validImageExtension = ['jpg', 'jpeg', 'png'];
              $imageExtension = explode('.', $fileName);
              $imageExtension = strtolower(end($imageExtension));
              if ( !in_array($imageExtension, $validImageExtension) ){
                echo
                "
                <script>
                  alert('Invalid Image Extension');
                </script>
                ";
              }
              else if($fileSize > 10000000){
                echo
                "
                <script>
                  alert('Image Size Is Too Large');
                </script>
                ";
              }
              else{
                $newImageName = uniqid();
                $newImageName .= '.' . $imageExtension;
                move_uploaded_file($tmpName, 'assets/img/products/' . $newImageName);
                $this->model->addProduct($name, $gia, $newImageName);
                echo
                "
                <script>
                  alert('Thêm sản phẩm thành công');
                </script>
                ";
                Header("Refresh: 0; url='?r=/'");
              }
            }
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
