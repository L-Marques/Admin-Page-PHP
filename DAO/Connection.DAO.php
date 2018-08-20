<?php

class Connection 
{
    private $connection;
    private $db_dsn = 'mysql:host=127.0.0.1;dbname=eshopper';
    private $db_user = 'root';
    private $db_password = '';

    public function __construct() {
        try{
            $this->connection = new PDO("$this->db_dsn", "$this->db_user", "$this->db_password");
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    protected function getConnection() {
        return $this->connection;
    }
}
