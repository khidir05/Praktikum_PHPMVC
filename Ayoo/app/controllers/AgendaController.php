<?php
require_once '../app/models/Agenda.php';

class AgendaController {
    private $agendaModel;

    public function __construct() {
        $this->agendaModel = new Agenda();
    }

    public function index() {
        $agendas = $this->agendaModel->getAllAgendas();
        require_once '../app/views/agenda/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nama = $_POST['nama_agenda'];
            $start_time = $_POST['start_date'];
            $end_time = $_POST['end_date'];
            $description = $_POST['description'];
            $location = $_POST['location'];
    
            // Upload file
            if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
                $targetDirectory = __DIR__ . '/../../public/uploads/';
                $timestamp = time();
                $fileName = $timestamp . "-" . basename($_FILES["photo"]["name"]);
                $targetFile = $targetDirectory . $fileName;
    
                // Pindahkan file ke direktori tujuan
                if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
                    // File berhasil di-upload
                } else {
                    // Kesalahan saat meng-upload file
                }
            }
    
            // Simpan agenda ke database
            if ($this->agendaModel->addAgenda($nama, $start_time, $end_time, $description, $location)) {
                header('Location: /agenda');
                exit;
            }
        }
        require __DIR__ . '/../views/agenda/create.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama_agenda = $_POST['nama_agenda'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $description = $_POST['description'];
            $location = $_POST['location'];
    
            // Debugging: Periksa data yang diterima
            var_dump($_POST);
    
            if ($this->agendaModel->addAgenda($nama_agenda, $start_date, $end_date, $description, $location)) {
                header('Location: /agenda');
                exit;
            } else {
                echo "Gagal menambahkan data."; // Pesan kesalahan jika gagal
            }
        }
    }

    public function edit($id) {
        $agenda = $this->agendaModel->getAgendaById($id);
        if (!$agenda) {
            header('Location: /agenda');
            exit;
        }
        require_once '../app/views/agenda/edit.php';
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama_agenda = $_POST['nama_agenda'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $description = $_POST['description'];
            $location = $_POST['location'];
    
            // Debugging
            var_dump($_POST); // Lihat data yang diterima
            var_dump($id); // Pastikan ID yang diterima benar
    
            if ($this->agendaModel->updateAgenda($id, $nama_agenda, $start_date, $end_date, $description, $location)) {
                header('Location: /agenda');
                exit;
            } else {
                echo "Gagal memperbarui data."; // Pesan kesalahan jika update gagal
            }
        } else {
            $agenda = $this->agendaModel->getAgendaById($id);
            if (!$agenda) {
                header('Location: /agenda');
                exit;
            }
        }
        
        require_once '../app/views/agenda/edit.php';
    }

    public function delete($id) {
        if($this->agendaModel->deleteAgenda($id)) {
            $_SESSION['flash_message'] = 'success_delete';
            header('Location: /agenda');
            exit;
        } else {
            $_SESSION['flash_message'] = 'error';
            header('Location: /agenda');
            exit;
        }
    }
}