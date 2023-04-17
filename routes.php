<!-- Đường dẫn -->

<?php
$routes = [
    '/' => [
        'controller' => 'HomeController',
        'action' => 'index'
    ],
    'register' => [
        'controller' => 'AccountController',
        'action' => 'register'
    ],
    'login' => [
        'controller' => 'AccountController',
        'action' => 'login'
    ],
    'search' => [
        'controller' => 'HomeController',
        'action' => 'search'
    ],
    'logout' => [
        'controller' => 'AccountController',
        'action' => 'logout',
        'middleware' => 'auth'
    ],
    'edituser' => [
        'controller' => 'AccountController',
        'action' => 'edituser',
        'middleware' => 'auth'
    ],
    'themsanpham' => [
        'controller' => 'ProductController',
        'action' => 'themsanpham',
        'middleware' => 'auth',
        'admin' => 'admin'
    ],
    'addcategory' => [
        'controller' => 'ProductController',
        'action' => 'addcategory',
        'middleware' => 'auth',
        'admin' => 'admin'
    ],
    'editsanpham' => [
        'controller' => 'ProductController',
        'action' => 'editsanpham',
        'middleware' => 'auth',
        'admin' => 'admin'
    ],
    'editCategory' => [
        'controller' => 'ProductController',
        'action' => 'editCategory',
        'middleware' => 'auth',
        'admin' => 'admin'
    ],
    'danhsachsanpham' => [
        'controller' => 'ProductController',
        'action' => 'danhsachsanpham',
        'middleware' => 'auth',
        'admin' => 'admin'
    ],
    'danhsachAccount' => [
        'controller' => 'AccountController',
        'action' => 'danhsachAccount',
        'middleware' => 'auth',
        'admin' => 'admin'
    ],
    'listcategory' => [
        'controller' => 'ProductController',
        'action' => 'listcategory',
        'middleware' => 'auth',
        'admin' => 'admin'
    ],
    'addCart' => [
        'controller' => 'CartController',
        'action' => 'addCart'
    ],
    'delCart' => [
        'controller' => 'CartController',
        'action' => 'delCart'
    ],
    'updateCart' => [
        'controller' => 'CartController',
        'action' => 'updateCart'
    ],
    'viewCart' => [
        'controller' => 'CartController',
        'action' => 'viewCart'
    ],
    'thanhtoan' => [
        'controller' => 'HoaDonController',
        'action' => 'thanhtoan',
        'middleware' => 'auth'
    ],
    'hoadon' => [
        'controller' => 'HoaDonController',
        'action' => 'hoadon',
        'middleware' => 'auth'
    ],
    'hoadonuser' => [
        'controller' => 'HoaDonController',
        'action' => 'hoadonuser',
        'middleware' => 'auth'
    ],
    'chitiethoadon' => [
        'controller' => 'HoaDonController',
        'action' => 'chitiethoadon',
        'middleware' => 'auth'
    ],
    'addDiaChi' => [
        'controller' => 'CartController',
        'action' => 'addDiaChi',
        'middleware' => 'auth'
    ],
    'sendMail' => [
        'controller' => 'MailController',
        'action' => 'sendMail'
    ],
    'email' => [
        'controller' => 'AccountController',
        'action' => 'email',
        'middleware' => 'auth'
    ],
    'xacthuc' => [
        'controller' => 'AccountController',
        'action' => 'xacthuc'
    ],
    'forgotPass' => [
        'controller' => 'AccountController',
        'action' => 'forgotPass'
    ],
    'nhaptoken' => [
        'controller' => 'AccountController',
        'action' => 'nhaptoken'
    ]
];
//trấndacasdasdsa
?>