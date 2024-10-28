<?php
// app/models/User.php
require_once '../config/database.php';

class User {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function getAllUsers() {
        $query = $this->db->query("SELECT * FROM users");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addUser($name, $email) {
        $query = $this->db->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
        $query->bindParam(':name', $name);
        $query->bindParam(':email', $email);
        return $query->execute();
    }
}
