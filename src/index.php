<?php

session_start();

date_default_timezone_set('Europe/Brussels');


require 'controller/homeController.php';
require 'controller/adminController.php';
require 'controller/userSpaceController.php';


$controller = new HomeController();

if (isset($_GET['page']) && $_GET['page'] == 'admin' && isset($_SESSION['admin']) && $_SESSION['admin']) {
    $controller = new AdminController();
}

if (isset($_GET['page']) && $_GET['page'] == 'userSpace'  && isset($_SESSION['userName']) && $_SESSION['userName']) {
    $controller = new userSpaceController();
}


$view = $controller->render();
