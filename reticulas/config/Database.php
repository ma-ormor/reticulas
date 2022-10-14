<?php
class Database{
  // Parametros de la BD
  private $host = '192.168.100.50';
  private $db_name = 'reticulas';
  private $username = 'root'; 
  private $password = 'pass'; 
  private $conn;

  // Conexión a la BD
  public function connect(){
    $this->conn = null; 

    try{
      $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->db_name,
      $this->username, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
      echo 'Connection error'.$e->getMessage(); 
    }

    return $this->conn;
  }
}
?>
