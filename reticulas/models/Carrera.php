<?php
  class Carrera{
    private $conn; 
    private $table = 'carrera';
    
    public $id; 
    public $nombre;
    
    public function __construct($db){
      $this->conn = $db;
    }//builder
    
    public function read(){
      $consulta = 'SELECT c_id, c_nombre FROM carrera';
      $sentencia = $this->conn->prepare($consulta); 
      $sentencia->execute();     
      return $sentencia;
    }//read

    public function create(){
      $consulta = 'INSERT INTO ' . $this->table . ' SET c_id = :id, c_nombre = :nombre'; 
      $sentencia = $this->conn->prepare($consulta);

      $this->id = htmlspecialchars(strip_tags($this->id));
      $this->nombre = htmlspecialchars(strip_tags($this->nombre));

      $sentencia->bindParam(':id', $this->id);
      $sentencia->bindParam(':nombre', $this->nombre);

      if($sentencia->execute()) 
        return true;
      printf("Error: %s.\n", $sentencia->error); return false;
    }//function

    public function update(){
      $consulta = 'UPDATE ' . $this->table . ' SET c_nombre = :nombre WHERE c_id = :id';
      $sentencia = $this->conn->prepare($consulta);
      
      $this->id = htmlspecialchars(strip_tags($this->id));
      $this->nombre = htmlspecialchars(strip_tags($this->nombre));

      $sentencia->bindParam(':id', $this->id);
      $sentencia->bindParam(':nombre', $this->nombre);
      
      if($sentencia->execute()) 
        return true;
      printf("Error: %s.\n", $sentencia->error); return false;
    }//function

    public function delete(){
      $consulta = 'DELETE FROM '.$this->table.' WHERE c_id = :id'; 
      $sentencia = $this->conn->prepare($consulta);

      $this->id = htmlspecialchars(strip_tags($this->id));

      $sentencia->bindParam(':id', $this->id);

      if($sentencia->execute())
        return true;
      printf("Error: %s.\n", $sentencia->error); return false;
    }//function
  }//class
?>
