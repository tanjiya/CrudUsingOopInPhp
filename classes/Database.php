<?php

class Database {
    //Database Connection
    private $db_server = "mysql:dbname=crud_oop_in_php; host=localhost";
    private $user_name = "root"; 
    private $password  = "root";
    protected $connection;
        
    public function __construct() {
        try {
            $this->connection = new PDO($this->db_server, $this->user_name, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // echo "Connected Successfully";
        } catch (PDOException $e) {
            echo "Error Message: " . $e->getMessage();
        }
    }
}