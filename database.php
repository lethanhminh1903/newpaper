<?php
class Database {
    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "project";
    private $username = "root";
    private $password = "Namhong1412@#";
    public $connection;
 
    // get the database connectionection
    public function get_connection(){
        $this->connection = new mysqli($this->host,$this->username,$this->password,$this->db_name) or die("Connected Wrong (･´з`･)");
        mysqli_set_charset($this->connection, "utf8");
        return $this->connection;
    }
}
?>