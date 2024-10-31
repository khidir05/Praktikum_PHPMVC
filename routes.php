<?php
// routes.php

require_once 'app/controllers/SponsorController.php';
require_once 'app/controllers/AgendaController.php';
require_once 'app/controllers/EventsController.php';
require_once 'app/controllers/PesertaController.php';

$sponsorController = new SponsorController();
$agendaController = new AgendaController();
$eventsController = new EventsController();
$pesertaController = new PesertaController();

$url = $_SERVER['REQUEST_URI'];

if ($url == '/' || $url == '/sponsor') {
        $sponsorController->index();
    } elseif ($url == '/sponsor/create') {
        $sponsorController->create();
    } elseif ($url == '/sponsor/store') {
        $sponsorController->store();
    } elseif (strpos($url, '/sponsor/edit') !== false) {
        $id = $_GET['id'];
        $sponsorController->edit($id);
    } elseif ($url == '/sponsor/update') {
        $sponsorController->update();
    } elseif (strpos($url, '/sponsor/hapus') !== false) {
        $id = $_GET['id'];
        $sponsorController->hapus($id);
    } elseif ($url == '/agenda') {
        $agendaController->index();
    } elseif ($url == '/agenda/create') {
        $agendaController->create();
    } elseif ($url == '/agenda/store') {
        $agendaController->store();
    } elseif (strpos($url, '/agenda/edit') !== false) {
        $id = $_GET['id'];
        $agendaController->edit($id);
    } elseif ($url == '/agenda/update') {
        $agendaController->update();
    } elseif (strpos($url, '/agenda/hapus') !== false) {
        $id = $_GET['id'];
        $agendaController->hapus($id);
    } elseif ($url == '/events') {
        $eventsController->index();
    } elseif ($url == '/events/create') {
        $eventsController->create();
    } elseif ($url == '/events/store') {
        $eventsController->store();
    } elseif (strpos($url, '/events/edit') !== false) {
        $id = $_GET['id'];
        $eventsController->edit($id);
    } elseif ($url == '/events/update') {
        $eventsController->update();
    } elseif (strpos($url, '/events/hapus') !== false) {
        $id = $_GET['id'];
        $eventsController->hapus($id);
    } elseif ($url == '/events') {
        $eventsController->index();
    } elseif ($url == '/peserta/create') {
        $pesertaController->create();
    } elseif ($url == '/peserta/store') {
        $pesertaController->store();
    } elseif (strpos($url, '/peserta/edit') !== false) {
        $id = $_GET['id'];
        $pesertaController->edit($id);
    } elseif ($url == '/peserta/update') {
        $pesertaController->update();
    } elseif (strpos($url, '/peserta/hapus') !== false) {
        $id = $_GET['id'];
        $pesertaController->hapus($id);
    } else {
        echo "404 Not Found";
    }
