<?php
session_start();
class CartController
{

    function addCart()
    {
        if (!isset($_SESSION['giohang'])) {
            $_SESSION['giohang'] = [];
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $image = $_POST['image'];
            $sl = $_POST['soluong'];
            $kiemtra = true;
            $i = 0;
            if ($sl > 0) {
                foreach ($_SESSION['giohang'] as $item) {
                    if ($item[0] == $id) {
                        $slNew = $sl + $item[3];
                        $_SESSION['giohang'][$i][3] = $slNew;
                        $kiemtra = false;
                    }
                    $i++;
                }
                if ($kiemtra) {
                    $item = array($id, $name, $price, $sl, $image);
                    $_SESSION['giohang'][] = $item;
                }
            }
            header('Location: ?r=/');
        }
    }

    function delCart()
    {
        if (isset($_SESSION['giohang'])) {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $i = 0;
                while (true) {
                    if ($_SESSION['giohang'][$i][0] == $id) {
                        unset($_SESSION['giohang'][$i]);
                        $i = 0;
                        header('Location: ?r=viewCart');
                        exit;
                    }
                    $i++;
                }
            } else {
                unset($_SESSION['giohang']);
                header('Location: ?r=/');
            }

        } else {
            echo "<script> alert('Không tồn tại giỏ hàng'); </script>";
            Header("Refresh: 0; url='?r=viewCart'");
        }

    }
    function updateCart(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $sl = $_POST['soluong'];
            $i = 0;
            foreach ($_SESSION['giohang'] as $item) {
                if ($item[0] == $id) {
                    $_SESSION['giohang'][$i][3] = $sl;
                }
                $i++;
            }
            header('Location: ?r=viewCart');
        }
    }

    function viewCart()
    {
        require_once('views/product/cart.php');
    }

    function addDiaChi(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_SESSION['diachi']=$_POST['diachi'];
            echo "<script> alert('Xác nhận đại chỉ thành công'); </script>";
            Header("Refresh: 0; url='?r=viewCart'");
        }else{
            header('Location: ?r=viewCart');
        }
    }
}
?>