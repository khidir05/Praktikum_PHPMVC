<?php
require_once 'app/controllers/PesertaController.php';

$pesertaController = new PesertaController();

$url = $_SERVER['REQUEST_URI'];

if ($url == '/' || $url == '/peserta') {
    $pesertaController->index();
} elseif ($url == '/peserta/create') {
    $pesertaController->create();
} elseif ($url == '/peserta/store') {
    $pesertaController->store();
} elseif (strpos($url, '/peserta/edit') !== false) {
    $id = $_GET['id'];
    $pesertaController->edit($id);
} elseif (strpos($url, '/peserta/delete') !== false) {
    $id = $_GET['id'];
    $pesertaController->delete($id);
} elseif ($url == '/peserta/update') {
    $pesertaController->update();
} else {
    echo "404 Not Found";
}