<?php
require_once '../config/database.php';

class User {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function getAllUsers() {
        $query = $this->db->query("SELECT * FROM agenda");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addUser($nama_agenda, $start_date, $end_date, $description, $location) {
        $query = $this->db->prepare("INSERT INTO agenda (nama_agenda, start_date, end_date, description, location) 
                                   VALUES (:nama_agenda, :start_date, :end_date, :description, :location)");
        
        $query->bindParam(':nama_agenda', $nama_agenda);
        $query->bindParam(':start_date', $start_date);
        $query->bindParam(':end_date', $end_date);
        $query->bindParam(':description', $description);
        $query->bindParam(':location', $location);
        
        return $query->execute();
    }

    public function getUserById($id) {
        $query = $this->db->prepare("SELECT * FROM agenda WHERE id_agenda = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUser($id, $nama_agenda, $start_date, $end_date, $description, $location) {
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
        
        return $query->execute();
    }

    public function deleteUser($id) {
        $query = $this->db->prepare("DELETE FROM agenda WHERE id_agenda = :id");
        $query->bindParam(':id', $id);
        return $query->execute();
    }
}