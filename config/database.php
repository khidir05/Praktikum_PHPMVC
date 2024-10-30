<?php
// config/database.php
class Database {
    private $host = 'mdi.my.id';
    private $db_name = 'basdeat2_klp1';
    private $username = 'basdeat2_usr1';
    private $password = 'k3JF@q@hX%X=Ug^C7)';
    private $conn;

    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }
        return $this->conn;
    }
//     public function rowCount() {
//         return $this->conn->rowCount();
//     }
}

