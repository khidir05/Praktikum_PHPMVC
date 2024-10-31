<?php
require_once '../config/database.php';

class Agenda {
    private $db;

    public function __construct() {
        $database = new Database();
            $this->db = $database->connect();
            
            if ($this->db === null) {
                throw new Exception("Database connection failed");
            }
    }

    public function getAllAgendas() {
        $query = $this->db->query("SELECT * FROM agenda ORDER BY start_date DESC");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addAgenda($nama_agenda, $start_date, $end_date, $description, $location) {
        $query = $this->db->prepare("INSERT INTO agenda (nama, start_date, end_date, description, location) 
                                      VALUES (:nama, :start_date, :end_date, :description, :location)");
    
        $query->bindParam(':nama',$nama_agenda);
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

    public function updateAgenda($id, $nama, $start_date, $end_date, $description, $location) {
        $query = $this->db->prepare("UPDATE agenda SET 
                nama = ?, 
                start_date = ?, 
                end_date = ?, 
                description = ?,
                location = ?
                WHERE id_agenda = ?");
                
            $query->execute([
                $nama,
                $start_date,
                $end_date,
                $description,
                $location,
                $id
            ]);
            
            return true;
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

    
    public function deleteAgenda($id) {
        $query = $this->db->prepare("DELETE FROM agenda WHERE id_agenda = :id");
        $query->bindParam(':id', $id);
        return $query->execute(); // Kembalikan hasil eksekusi
    }
}