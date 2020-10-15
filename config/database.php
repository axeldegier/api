<?php
class Database{
   // Database instellingen
   private $host = "localhost";
   private $db_name = "u532600_api";
   private $username = "u532600_root";
   private $password = "Admin123";
   public $conn;
   public function getConnection(){
       $this->conn = null;
       try
{
   $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
}
catch(Exception $e)
{
   echo "Fout tijdens verbinden: " . $e->getMessage();
}
       return $this->conn;
   }
}