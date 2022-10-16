<?php

class DatabaseConnection{

    public function __construct()
    {
        $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
        if(!$conn){
            die("<h1>Database connection failed</h1>");
        }
        // else{
        //     echo "Database connected";
        // }
        return $this->conn = $conn;
        
    }
}