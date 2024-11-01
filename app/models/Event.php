<?php
// app/models/EventModel.php

require_once __DIR__ . '/../../config/database.php';

class EventModel
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getAll()
    {
        $query = "SELECT * FROM events";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($title, $description, $timeStart, $timeEnd, $location, $photo)
    {
        $query = "INSERT INTO events (title, description, photo, time_start, time_end, location) VALUES (:title, :description, :photo, :time_start, :time_end, :location)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':photo', $photo);
        $stmt->bindParam(':time_start', $timeStart);
        $stmt->bindParam(':time_end', $timeEnd);
        $stmt->bindParam(':location', $location);
        return $stmt->execute();
    }

    public function get($id)
    {
        $query = "SELECT * FROM events WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $title, $description, $timeStart, $timeEnd, $location, $photo = null)
    {
        if ($photo) {
            $query = "UPDATE events SET title = :title, description = :description, photo = :photo, time_start = :time_start, time_end = :time_end, location = :location WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':photo', $photo);
        } else {
            $query = "UPDATE events SET title = :title, description = :description, time_start = :time_start, time_end = :time_end, location = :location WHERE id = :id";
            $stmt = $this->conn->prepare($query);
        }

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':time_start', $timeStart);
        $stmt->bindParam(':time_end', $timeEnd);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':id', $id);
        
        return $stmt->execute();
    }

    public function delete($id)
    {
        $query = "DELETE FROM events WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}