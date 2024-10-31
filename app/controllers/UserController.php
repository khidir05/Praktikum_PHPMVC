<?php
require_once '../app/models/User.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function index() {
        $users = $this->userModel->getAllUsers();
        require_once '../app/views/user/index.php';
    }

    public function create() {
        require_once '../app/views/user/create.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama_agenda = $_POST['nama_agenda'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $description = $_POST['description'];
            $location = $_POST['location'];

            if($this->userModel->addUser($nama_agenda, $start_date, $end_date, $description, $location)) {
                header('Location: /user');
                exit;
            }
        }
    }

    public function edit($id) {
        $user = $this->userModel->getUserById($id);
        require_once '../app/views/user/edit.php';
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama_agenda = $_POST['nama_agenda'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $description = $_POST['description'];
            $location = $_POST['location'];

            if($this->userModel->updateUser($id, $nama_agenda, $start_date, $end_date, $description, $location)) {
                header('Location: /user');
                exit;
            }
        }
    }

    public function delete($id) {
        if($this->userModel->deleteUser($id)) {
            header('Location: /user');
            exit;
        }
    }
}