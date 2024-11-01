<?php
require_once  '../app/models/Peserta.php';
require_once  '../app/models/Event.php';

class PesertaController {
    protected $pesertaModel;
    protected $eventModel;

    public function __construct() {
        $this->pesertaModel = new PesertaModel();
        $this->eventModel = new EventModel();
    }

    public function index() {
        $peserta = $this->pesertaModel->getAllPeserta();
        require_once '../app/views/peserta/sidebar.php';
        require_once '../app/views/peserta/index.php';
    }

    public function create() {
        $events = $this->eventModel->getAll();
        require_once '../app/views/peserta/sidebar.php';
        require_once '../app/views/peserta/create.php';
    }

    public function store() {
        if  ($_SERVER['REQUEST_METHOD'] === 'POST'){
                $nama = $_POST['name'];
                $kontak = $_POST['contact'];
                $event_pilihan = $_POST['event_pilihan'];

            if ($this->pesertaModel->tambahPeserta($nama, $kontak, $event_pilihan)){
                header('Location: /peserta');
                exit;
            }
        }
    }

    public function edit($id) {
        $peserta = $this->pesertaModel->getPesertaById($id);
        $events = $this->eventModel->getAll();
        require_once '../app/views/peserta/sidebar.php';
        require_once '../app/views/peserta/edit.php';
    }
    
    public function update() {
        $id = $_POST['id'];
        $nama = $_POST['name'];
        $kontak = $_POST['contact'];
        $event_pilihan = $_POST['event_pilihan'];
    
        $this->pesertaModel->updatePeserta(
            $id,
                $nama,
                $kontak,
                $event_pilihan
            );
            
        $_SESSION['flash_message'] = 'success_update';
        header('Location: /peserta');
    }

    public function delete($id) {
        $this->pesertaModel->deletePeserta($id);

        $_SESSION['flash_message'] = 'success_delete';
        header('Location: /peserta');
    }
}