<!-- Đường dẫn -->

<?php 
$routes = [
    '/' => [
        'controller' => 'HomeController',
        'action' => 'index'
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
    'danhsachsanpham' => [
        'controller' => 'ProductController',
        'action' => 'danhsachsanpham',
        'middleware' => 'auth'
    ]
];
?>