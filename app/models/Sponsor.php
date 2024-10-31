<?php
require_once '../config/database.php';

class Sponsor {
    protected $db;

    public function __construct() {
        $database = new Database();
            $this->db = $database->connect();
            
            if ($this->db === null) {
                throw new Exception("Database connection failed");
            }
    }

    public function getAllSponsors() {
        $query = $this->db->query("SELECT * FROM sponsor");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addSponsor($nama_event, $nama_sponsor, $kontribusi_sponsor, $besaran_kontribusi) {
        $query = $this->db->prepare("INSERT INTO sponsor (nama_event, nama_sponsor, kontribusi_sponsor, besaran_kontribusi) VALUES (:nama_event, :nama_sponsor, :kontribusi_sponsor, :besaran_kontribusi)");
        $query->bindParam(':nama_event', $nama_event);
        $query->bindParam(':nama_sponsor', $nama_sponsor);
        $query->bindParam(':kontribusi_sponsor', $kontribusi_sponsor);
        $query->bindParam(':besaran_kontribusi', $besaran_kontribusi);
        return $query->execute();
    }

    public function updateSponsor($id_sponsor, $nama_event, $nama_sponsor, $kontribusi_sponsor, $besaran_kontribusi) {
        $query = $this->db->prepare("UPDATE sponsor SET 
                nama_event = ?, 
                nama_sponsor = ?, 
                kontribusi_sponsor = ?, 
                besaran_kontribusi = ? 
                WHERE id_sponsor = ?");
                
            $query->execute([
                $nama_event,
                $nama_sponsor,
                $kontribusi_sponsor,
                $besaran_kontribusi,
                $id_sponsor
            ]);
            
            return true;
    }
    
    public function getSponsorById($id) {
        $query = $this->db->prepare("SELECT * FROM sponsor WHERE id_sponsor = ?");
            $query->execute([$id]);
            return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteSponsor($id) {
        $query = $this->db->prepare("DELETE FROM sponsor WHERE id_sponsor = ?");
            $query->execute([$id]);
            return true;
    }
}