<?php
require_once '../app/models/Agenda.php';

class AgendaController {
    private $agendaModel;

    public function __construct() {
        $this->agendaModel = new Agenda();
    }

    public function index() {
        $agendas = $this->agendaModel->getAllAgendas();
        require_once '../app/views/agenda/sidebar.php';
        require_once '../app/views/agenda/index.php';
    }

    public function create() {
        require_once '../app/views/agenda/sidebar.php';
        require_once '../app/views/agenda/create.php';
        if(isset($_POST)){
            $nama = $_POST['nama'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $description = $_POST['description'];
            $location = $_POST['location'];
            $this->agendaModel->addAgenda(
                $nama, 
                $start_date, 
                $end_date, 
                $description,
                $location);
    
            $_SESSION['flash_message'] = 'success_add';
        }
        
    }

    public function store() {
        $nama = $_POST['nama'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $description = $_POST['description'];
        $location = $_POST['location'];
        $this->agendaModel->addAgenda(
            $nama, 
            $start_date, 
            $end_date, 
            $description,
            $location);

        $_SESSION['flash_message'] = 'success_add';
        header('Location: /agenda');
    }

    public function edit($id) {
        $agenda = $this->agendaModel->getAgendaById($id);
        if (!$agenda) {
            header('Location: /agenda');
            exit;
        }
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Check if the required fields are set
            if (isset($_POST['nama'], $_POST['start_date'], $_POST['end_date'], $_POST['description'], $_POST['location'])) {
                $nama = $_POST['nama'];
                $start_date = $_POST['start_date'];
                $end_date = $_POST['end_date'];
                $description = $_POST['description'];
                $location = $_POST['location'];
    
                $this->agendaModel->updateAgenda($id, $nama, $start_date, $end_date, $description, $location);
                $_SESSION['flash_message'] = 'success_update';
                header('Location: /agenda');
                exit; // Ensure to exit after header redirection
            } else {
                // Handle the case when required fields are missing
                $_SESSION['flash_message'] = 'error_missing_fields';
            }
        }
        require_once '../app/views/agenda/sidebar.php';
        require_once '../app/views/agenda/edit.php';
    }

    // public function update($id) {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         $nama_agenda = $_POST['nama_agenda'];
    //         $start_date = $_POST['start_date'];
    //         $end_date = $_POST['end_date'];
    //         $description = $_POST['description'];
    //         $location = $_POST['location'];
    
    //         // Debugging
    //         var_dump($_POST); // Lihat data yang diterima
    //         var_dump($id); // Pastikan ID yang diterima benar
    
    //         if ($this->agendaModel->updateAgenda($id, $nama_agenda, $start_date, $end_date, $description, $location)) {
    //             header('Location: /agenda');
    //             exit;
    //         } else {
    //             echo "Gagal memperbarui data."; // Pesan kesalahan jika update gagal
    //         }
    //     } else {
    //         $agenda = $this->agendaModel->getAgendaById($id);
    //         if (!$agenda) {
    //             header('Location: /agenda');
    //             exit;
    //         }
    //     }
        
    //     require_once '../app/views/agenda/edit.php';
    // }

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