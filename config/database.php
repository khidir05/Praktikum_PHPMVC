<?php
// config/database.php

class Database {
    private $host = 'mdi.my.id';
    private $db_name = 'basdeat2_klp1';
    private $username = 'basdeat2_usr1';
    private $password = 'k3JF@q@hX%X=Ug^C7)';
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
