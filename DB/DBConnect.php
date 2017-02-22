<?php

namespace DB;

use Models\User;

//implementing Singleton
class DBConnect
{
    private $db_hostname = "localhost";
    private $db_username = "root";
    private $db_password = "";
    private $db_database = "tabalugadb";

    private $mysqli;

    private static $instance = null;

    private function __construct() {

        $this->db_hostname = "localhost";
        $this->db_username = "root";
        $this->db_password = "";
        $this->db_database = "tabalugadb";

        $this->mysqli = new \mysqli($this->db_hostname, $this->db_username, $this->db_password, $this->db_database);

        if($this->mysqli->connect_errno > 0){
            die('Unable to connect to database [' . $this->mysqli->connect_error . ']');
        }
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new DBConnect();
        }
        return self::$instance;
    }

    public function getUser($email)
    {
        $sql = 'SELECT * FROM users where email = "'.  $email . '"';

        $result = $this->mysqli->query($sql);

        if ($result->num_rows > 0) {
            return true;
        }

        return false;
    }

    public function addUser($email, $name, $password)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO users (email, name, password) VALUES (?, ?, ?)");

        $stmt->bind_param("sss", $email, $name, md5($password));

        $stmt->execute();

        if ($stmt->affected_rows == 1){
            return true;
        }

        return false;
    }
}