<?php
require_once('configs/database.php');
require_once('models/HoaDon.php');

class HoaDonController
{
    private $model;
    function __construct()
    {
        global $pdo;
        $this->model = new HoaDon($pdo);
    }
    function thanhtoan()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        if(isset($_SESSION['diachi']) && $_SESSION['diachi']!=""){
            if (isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {
                $hoaDonId = uniqid();
                $total = $_GET['total'];
                $day = date("Y-m-d H:i:s");
                $userId = $_SESSION['userId'];
                $diaChi = $_SESSION['diachi'];
                $isAddHD = $this->model->addHoaDon($hoaDonId, $day, $userId, $total, $diaChi);
                if ($isAddHD) {
                    foreach ($_SESSION['giohang'] as $item) {
                        $isAddCTHD = $this->model->addCTHD($hoaDonId, $item[0], $item[3]);
                        $isGiam = $this->model->giamSLProduct($item[0], $item[3]);
                    }
                    if ($isAddCTHD && $isGiam) {
                        unset($_SESSION['giohang']);
                        echo "<script>alert('Thanh toán thành công');</script>";
                        Header("Refresh: 0; url='?r=/'");
                    }
                }
            } else {
                echo "<script>alert('Không có sản phẩm nào để thanh toán');</script>";
                Header("Refresh: 0; url='?r=/'");
            }
        }
        else{
            echo "<script>alert('Vui lòng xác nhận địa chỉ');</script>";
            Header("Refresh: 0; url='?r=viewCart'");
        }
    }

    function hoadon()
    {
        $danhSachHoaDon = $this->model->getAllHoaDon();
        require_once('views/product/danhsachhoadon.php');
    }

    function chitiethoadon()
    {
        $hoaDonId = $_GET['id'];
        $danhSachCTHD = $this->model->getCTHD($hoaDonId);
        require_once('views/product/danhsachcthd.php');
    }
}
?>