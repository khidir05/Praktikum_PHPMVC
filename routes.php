<?php
require_once 'app/controllers/AgendaController.php';
$controller = new AgendaController();
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

if ($action === 'create') {
    $controller->create();
} elseif ($action === 'edit' && $id) {
    $controller->edit($id);
} elseif ($action === 'delete' && $id) {
    $controller->delete($id);
} else {
    $controller->index();
}

