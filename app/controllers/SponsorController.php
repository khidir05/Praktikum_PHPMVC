<?php 

require_once '../app/models/Sponsor.php';
require_once  '../app/models/Event.php';

class SponsorController {
    protected $sponsorModel;
    protected $eventModel;

    public function __construct() {
        $this->sponsorModel = new Sponsor();
        $this->eventModel = new EventModel();
    }

    public function index() {
        $sponsors = $this->sponsorModel->getAllSponsors();
        require_once '../app/views/sponsor/sidebar.php';
        require_once '../app/views/sponsor/index.php';
    }

    public function create() {
        $events = $this->eventModel->getAll();
        require_once '../app/views/sponsor/sidebar.php';
        require_once '../app/views/sponsor/create.php';
    }

    public function store() {
        $nama_event = $_POST['event_name'];
        $nama_sponsor = $_POST['sponsor_name'];
        $kontribusi_sponsor = $_POST['contribution'];
        $besaran_kontribusi = $_POST['contribution_amount'];
        $this->sponsorModel->addSponsor(
            $nama_event, 
            $nama_sponsor, 
            $kontribusi_sponsor, 
            $besaran_kontribusi);

        $_SESSION['flash_message'] = 'success_add';
        header('Location: /sponsor');
    }

    public function edit($id) {
        $events = $this->eventModel->getAll();
        $sponsor = $this->sponsorModel->getSponsorById($id);
        require_once '../app/views/sponsor/sidebar.php';
        require_once '../app/views/sponsor/edit.php';
    }
    
    public function update() {
        $id_sponsor = $_POST['id_sponsor'];
        $nama_event = $_POST['nama_event'];
        $nama_sponsor = $_POST['nama_sponsor'];
        $kontribusi_sponsor = $_POST['kontribusi_sponsor'];
        $besaran_kontribusi = $_POST['besaran_kontribusi'];
    
        $this->sponsorModel->updateSponsor(
                $id_sponsor,
                $nama_event,
                $nama_sponsor,
                $kontribusi_sponsor,
                $besaran_kontribusi
            );
            
        $_SESSION['flash_message'] = 'success_update';
        header('Location: /sponsor');
    }

    public function hapus($id) {
        $this->sponsorModel->deleteSponsor($id);

        $_SESSION['flash_message'] = 'success_delete';
        header('Location: /sponsor');
    }
}