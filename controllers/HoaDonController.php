<?php
require_once('configs/database.php');
require_once('models/HoaDon.php');

class HoaDonController{
    private $model;
    function __construct(){
        global $pdo;
       $this->model = new HoaDon($pdo);
    }
    function thanhtoan(){
        if(isset($_SESSION['giohang']) && count($_SESSION['giohang'])>0){
            $hoaDonId = uniqid();
            $total = $_GET['total'];
            $day = date("Y-m-d H:i:s");
            $userId = $_SESSION['userId'];
            $isAddHD = $this->model->addHoaDon($hoaDonId, $day, $userId,$total);
            if($isAddHD){
                foreach ($_SESSION['giohang'] as $item) {
                    $isAddCTHD = $this->model->addCTHD($hoaDonId, $item[0],$item[3]);
                }
                if($isAddCTHD){
                    unset($_SESSION['giohang']);
                    echo "<script>alert('Thanh toán thành công');</script>";
                    Header("Refresh: 0; url='?r=/'");
                }
            }
        }else{
            echo "<script>alert('Không có sản phẩm nào để thanh toán');</script>";
            Header("Refresh: 0; url='?r=/'");
        }
        
    }
  }
?>
