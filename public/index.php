<?php
spl_autoload_register(function ($className) {

    $classPath = str_replace('\\', '/', $className);

    $classPath = '../Class/' . $classPath . '.php';

    if (!file_exists($classPath)) {

        header('Location: index.php?page=error&action=notFound');

    } else {

        require $classPath;

    }
});
session_start();
require '../config/db.config.php';
$page = "welcome";
$action = "start";

if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
$page = strtolower($page);
$page = ucfirst($page);
$page .= 'Controller';
$page = '\Controller\\' . $page;


if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
$action = strtolower($action);
$action = ucfirst($action);
$action = 'action' . $action;
$controller = new $page();
if (!method_exists($controller, $action)) {
    header('Location: index.php?page=error&action=notFound');
    die;
}

$controller->$action();