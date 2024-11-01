<?php
require_once '../config/database.php';

class PesertaModel {
    private $db;

    public function __construct() {
        $database = new Database();
            $this->db = $database->connect();
            
            if ($this->db === null) {
                throw new Exception("Database connection failed");
            }
        }

    public function getAllPeserta() {
        $peserta = $this->db->prepare("SELECT * FROM peserta");
        $peserta->execute();
        return $peserta->fetchAll(PDO::FETCH_ASSOC);
    }

    public function tambahPeserta($nama, $kontak, $event_pilihan) {
        $peserta = $this->db->prepare("INSERT INTO peserta (nama, kontak, event_pilihan) VALUES (?, ?, ?)");
        $peserta->execute([$nama, $kontak, $event_pilihan]);
        header('Location: /peserta');
    }

    public function updatePeserta($id, $nama, $kontak, $event_pilihan) {
        $peserta = $this->db->prepare("UPDATE peserta SET nama = ?, kontak = ?, event_pilihan = ? WHERE id = ?");
        $peserta->execute([$nama, $kontak, $event_pilihan, $id]);
        header('Location: /peserta');
    }

    public function getPesertaById($id) {
        $query = $this->db->prepare("SELECT * FROM peserta WHERE id = ?");
            $query->execute([$id]);
            return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function deletePeserta($id) {
        $query = $this->db->prepare("DELETE FROM peserta WHERE id = ?");
            $query->execute([$id]);
            return true;
    }
}