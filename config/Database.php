<?php

class Database
{
    // DB parameters
    private $host = 'localhost';
    private $db_name = 'PHP_Rest_API';
    private $username = 'root';
    private $password = 'secure123';
    private $conn;

    // DB connectin details
    public function connect()
    {
        $this->conn = null; // setting connection t null


        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname= ' . $this->db_name, $this->username, $this->password);
        } catch (PDOException $e) {
            echo 'Connection error: ' . $e->getMessage();
        }
        return $this->conn;
    }
}
