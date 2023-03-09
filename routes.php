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
    ]
];
?>