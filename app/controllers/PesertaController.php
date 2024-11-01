<?php
require_once  '../app/models/Peserta.php';

class PesertaController {
    protected $pesertaModel;

    public function __construct() {
        $this->pesertaModel = new PesertaModel();
    }

    public function index() {
        $peserta = $this->pesertaModel->getAllPeserta();
        require_once '../app/views/peserta/sidebar.php';
        require_once '../app/views/peserta/index.php';
    }

    public function create() {
        require_once '../app/views/peserta/sidebar.php';
        require_once '../app/views/peserta/create.php';
    }

    public function store() {
        if  ($_SERVER['REQUEST_METHOD'] === 'POST'){
                $nama = $_POST['name'];
                $kontak = $_POST['contact'];

            if ($this->pesertaModel->tambahPeserta($nama, $kontak)){
                header('Location: /peserta');
                exit;
            }
        }
    }

    public function edit($id) {
        $peserta = $this->pesertaModel->getPesertaById($id);
        require_once '../app/views/peserta/sidebar.php';
        require_once '../app/views/peserta/edit.php';
    }
    
    public function update() {
        $id = $_POST['id'];
        $nama = $_POST['name'];
        $kontak = $_POST['contact'];
    
        $this->pesertaModel->updatePeserta(
            $id,
                $nama,
                $kontak
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
