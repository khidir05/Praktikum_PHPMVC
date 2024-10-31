<?php
// routes.php

require_once 'app/controllers/SponsorController.php';

$controller = new SponsorController();

$url = $_SERVER['REQUEST_URI'];

if ($url == '/sponsor' || $url == '/') {
    $controller->index();
    } elseif ($url == '/sponsor/create') {
        $controller->create();
    } elseif ($url == '/sponsor/store') {
        $controller->store();
    }elseif (strpos($url, '/sponsor/edit') !== false) {
        $id = $_GET['id'];
        $controller->edit($id);
    } elseif ($url == '/sponsor/update') {
        $controller->update();
    } elseif (strpos($url, '/sponsor/hapus') !== false) {
        $id = $_GET['id'];
        $controller->hapus($id);
    } else {
        echo "404 Not Found";
    }