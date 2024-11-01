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

    public function tambahPeserta($nama, $kontak) {
        $peserta = $this->db->prepare("INSERT INTO peserta (nama, kontak) VALUES (?, ?)");
        $peserta->execute([$nama, $kontak]);
        header('Location: /peserta');
    }

    public function updatePeserta($id, $nama, $kontak) {
        $peserta = $this->db->prepare("UPDATE peserta SET nama = ?, kontak = ? WHERE id = ?");
        $peserta->execute([$nama, $kontak, $id]);
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