<?php
require_once('routes.php');
$r = $_GET['r'] ?? '/';
if (isset($routes[$r])) {
    $controllerName = $routes[$r]['controller'];
    $action = $routes[$r]['action'];
    //kiem tra middleware co ton tai khong?
    require_once('controllers/' . $controllerName . '.php');
    $controller = new $controllerName();
    //check middleware
    if (isset($routes[$r]['middleware'])) {
        session_start();
        if (!isset($_SESSION['userId'])) {
            echo '<script language="javascript">alert("You Need Login First")</script>';
            // chuyen ve trang chu
            Header("Refresh: 0; url='?r=/'");
            // header('location: ?r=/');
            exit;
        }
    }
    //
    $controller->$action();
} else {
    echo "404 Not Found";
}
?>