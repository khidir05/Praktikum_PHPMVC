<?php
require_once '../config/database.php';

class Agenda {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function getAllAgendas() {
        $query = $this->db->query("SELECT * FROM agenda ORDER BY start_date DESC");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addAgenda($nama_agenda, $start_date, $end_date, $description, $location) {
        $query = $this->db->prepare("INSERT INTO agenda (nama_agenda, start_date, end_date, description, location) 
                                      VALUES (:nama_agenda, :start_date, :end_date, :description, :location)");
    
        $query->bindParam(':nama_agenda', $nama_agenda);
        $query->bindParam(':start_date', $start_date);
        $query->bindParam(':end_date', $end_date);
        $query->bindParam(':description', $description);
        $query->bindParam(':location', $location);
        
        // Debugging: Periksa apakah query berhasil
        if ($query->execute()) {
            return true;
        } else {
            var_dump($query->errorInfo()); // Tampilkan kesalahan jika ada
            return false;
        }
    }

    public function getAgendaById($id) {
        try {
            $query = $this->db->prepare("SELECT * FROM agenda WHERE id_agenda = ?");
            $query->execute([$id]);
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function updateAgenda($id, $nama_agenda, $start_date, $end_date, $description, $location) {
        $query = $this->db->prepare("UPDATE agenda 
                                   SET nama_agenda = :nama_agenda,
                                       start_date = :start_date,
                                       end_date = :end_date,
                                       description = :description,
                                       location = :location
                                   WHERE id_agenda = :id");
    
        $query->bindParam(':id', $id);
        $query->bindParam(':nama_agenda', $nama_agenda);
        $query->bindParam(':start_date', $start_date);
        $query->bindParam(':end_date', $end_date);
        $query->bindParam(':description', $description);
        $query->bindParam(':location', $location);
        
        // Debugging
        if ($query->execute()) {
            return true;
        } else {
            var_dump($query->errorInfo()); // Tampilkan kesalahan jika ada
            return false;
        }
    }
    
    public function deleteAgenda($id) {
        $query = $this->db->prepare("DELETE FROM agenda WHERE id_agenda = :id");
        $query->bindParam(':id', $id);
        return $query->execute(); // Kembalikan hasil eksekusi
    }
}