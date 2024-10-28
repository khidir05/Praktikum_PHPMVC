<?php
// routes.php

require_once 'app/controllers/UserController.php';

$controller = new UserController();

$url = $_SERVER['REQUEST_URI'];

if ($url == '/user/index' || $url == '/') {
    $controller->index();
} elseif ($url == '/user/create') {
    $controller->create();
} elseif ($url == '/user/store') {
    $controller->store();
} else {
    echo "404 Not Found";
}
