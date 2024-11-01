<?php 

require_once '../app/models/Agenda.php';

class AgendaController {
    protected $agendaModel;

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
    }

    public function store() {
        $nama_agenda = $_POST['nama_agenda'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $description = $_POST['description'];
        $location = $_POST['location'];
        $this->agendaModel->addAgenda(
            $nama_agenda, 
            $start_date, 
            $end_date, 
            $description,
            $location);

        $_SESSION['flash_message'] = 'success_add';
        header('Location: /agenda');
    }

    public function edit($id) {
        $agenda = $this->agendaModel->getAgendaById($id);
        require_once '../app/views/agenda/sidebar.php';
        require_once '../app/views/agenda/edit.php';
    }
    
    public function update() {
        $id_agenda = $_POST['id_agenda'];
        $nama_agenda = $_POST['nama_agenda'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $description = $_POST['description'];
        $location = $_POST['location'];
    
        $this->agendaModel->updateAgenda(
            $id_agenda,
                $nama_agenda,
                $start_date,
                $end_date,
                $description,
                $location
            );
            
        $_SESSION['flash_message'] = 'success_update';
        header('Location: /agenda');
    }

    public function hapus($id) {
        $this->agendaModel->deleteAgenda($id);

        $_SESSION['flash_message'] = 'success_delete';
        header('Location: /agenda');
    }
}