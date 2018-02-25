<?php

class Database {

    private $host;
    private $user;
    private $pass;
    private $db;
    public $mysqli;

    public function __construct() {
        $this->db_connect();
    }

    private function db_connect() {
        $this->host = 'localhost';
        $this->user = 'root';
        $this->pass = '';
        $this->db = 'car_db';

        $this->mysqli = new mysqli($this->host, $this->user, $this->pass, $this->db);
        return $this->mysqli;
    }

    public function db_insert($name, $color) {
        if (mysqli_connect_errno($this->mysqli)) {
            die("Failed to connect to MySQL: " . mysqli_connect_error());
        }
        $statement = $this->mysqli->prepare("INSERT INTO `cars`(`name`, `color`) VALUES (?,?)");
        $statement->bind_param('ss', $name, $color);
        if (!$statement->execute()) {
            echo "Execute failed: (" . $statement->errno . ") " . $statement->error;
        }
    }

}

//
//$db = new Database();
//$db->db_insert('Test02,#f48c2f');

