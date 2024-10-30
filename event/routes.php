<?php
// routes.php

require_once 'app/controllers/EventController.php';

$controller = new EventController();
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

if ($action === 'add') {
    $controller->add();
} elseif ($action === 'edit' && $id) {
    $controller->edit($id);
} elseif ($action === 'delete' && $id) {
    $controller->delete($id);
} else {
    $controller->index();
}
