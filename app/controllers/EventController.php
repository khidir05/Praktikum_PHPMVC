<?php
// app/controllers/EventController.php

require_once __DIR__ . '/../models/EventModel.php';
require_once __DIR__ . '/../../helpers.php';

class EventController
{
    private $eventModel;

    public function __construct()
    {
        $this->eventModel = new EventModel();
    }

    public function index()
    {
        $events = $this->eventModel->getAll();
        $success = getFlashMessage('success');
        $error = getFlashMessage('error');
        require __DIR__ . '/../views/events/sidebar.php';
        require __DIR__ . '/../views/events/index.php';
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $timeStart = $_POST['timeStart'];
            $timeEnd = $_POST['timeEnd'];
            $location = $_POST['location'];

            $targetDirectory = __DIR__ . '/../../public/uploads/';
            $timestamp = time();
            $fileName = $timestamp . "-" . basename($_FILES["photo"]["name"]);
            $targetFile = $targetDirectory . $fileName;

            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
                if ($this->eventModel->add($title, $description, $timeStart, $timeEnd, $location, $fileName)) {
                    $success = 'Add data successful!';
                } else {
                    $error = 'Add data failed!';
                }
            } else {
                $error = 'Uploading photo failed!';
            }
        }
        require __DIR__ . '/../views/events/sidebar.php';
        require __DIR__ . '/../views/events/add.php';
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $timeStart = $_POST['timeStart'];
            $timeEnd = $_POST['timeEnd'];
            $location = $_POST['location'];

            if (isset($_FILES['photo']) && $_FILES['photo']['error'] != UPLOAD_ERR_NO_FILE) {
                $targetDirectory = __DIR__ . '/../../public/uploads/';
                $timestamp = time();
                $fileName = $timestamp . "-" . basename($_FILES["photo"]["name"]);
                $targetFile = $targetDirectory . $fileName;
                if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
                    $event = $this->eventModel->get($id);
                    $oldPhoto = $targetDirectory . $event['photo'];
                    if (file_exists($oldPhoto)) {
                        unlink($oldPhoto);
                    }
                    if ($this->eventModel->update($id, $title, $description, $timeStart, $timeEnd, $location, $fileName)) {
                        $success = 'Edit data successful!';
                    } else {
                        $error = 'Edit data failed!';
                    }
                } else {
                    $error = 'Uploading photo failed!';
                }
            } else {
                if ($this->eventModel->update($id, $title, $description, $timeStart, $timeEnd, $location)) {
                    $success = 'Edit data successful!';
                } else {
                    $error = 'Edit data failed!';
                }
            }
        }

        $event = $this->eventModel->get($id);
        require __DIR__ . '/../views/events/sidebar.php';
        require __DIR__ . '/../views/events/edit.php';
    }

    public function delete($id)
    {
        $targetDirectory = __DIR__ . '/../../public/uploads/';
        $event = $this->eventModel->get($id);
        $oldPhoto = $targetDirectory . $event['photo'];
        if (file_exists($oldPhoto)) {
            unlink($oldPhoto);
        }
        
        if ($this->eventModel->delete($id)) {
            setFlashMessage('success', 'Delete data successful!');
        } else {
            setFlashMessage('success', 'Error data successful!');
        }
        header('Location: /event');
    }
}
