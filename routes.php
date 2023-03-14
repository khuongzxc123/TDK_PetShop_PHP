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
        'middleware' => 'auth'
    ],
    'editsanpham' => [
        'controller' => 'ProductController',
        'action' => 'editsanpham',
        'middleware' => 'auth'
    ],
    'danhsachsanpham' => [
        'controller' => 'ProductController',
        'action' => 'danhsachsanpham',
        'middleware' => 'auth'
    ],
    'danhsachAccount' => [
        'controller' => 'AccountController',
        'action' => 'danhsachAccount',
        'middleware' => 'auth'
    ],
    'addCart' => [
        'controller' => 'CartController',
        'action' => 'addCart'
    ],
    'delCart' => [
        'controller' => 'CartController',
        'action' => 'delCart'
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
?>