<?php
  // reticulas-api/
  class Materia{
    // Base de Datos
    private $conn; 
    private $table = 'materia';

    // Atributos
    public $id; 
    public $nombre;
    public $horas;

    public function __construct($db){
      $this->conn = $db;
    }//builder
    
    public function read(){
      $consulta = 'SELECT m_id, m_nombre, m_horas FROM '.$this->table;
      $sentencia = $this->conn->prepare($consulta); 
      $sentencia->execute();     
      return $sentencia;
    }//function

    public function create(){
      $consulta = 'INSERT INTO '.$this->table .' SET m_id = :id, m_nombre = :nombre, m_horas = :horas'; 
      $sentencia = $this->conn->prepare($consulta);

      $this->id = htmlspecialchars(strip_tags($this->id));
      $this->nombre = htmlspecialchars(strip_tags($this->nombre));
      $this->horas = htmlspecialchars(strip_tags($this->horas));

      $sentencia->bindParam(':id', $this->id);
      $sentencia->bindParam(':nombre', $this->nombre);
      $sentencia->bindParam(':horas', $this->horas);

      if($sentencia->execute()) 
        return true;
      printf("Error: %s.\n", $sentencia->error); return false;
    }//function

    public function update(){
      $consulta = 'UPDATE ' . $this->table . ' SET m_nombre = :nombre, m_horas = :horas WHERE m_id = :id';
      $sentencia = $this->conn->prepare($consulta);
      
      $this->id = htmlspecialchars(strip_tags($this->id));
      $this->nombre = htmlspecialchars(strip_tags($this->nombre));
      $this->horas = htmlspecialchars(strip_tags($this->horas));

      $sentencia->bindParam(':id', $this->id);
      $sentencia->bindParam(':nombre', $this->nombre);
      $sentencia->bindParam(':horas', $this->horas);
      
      if($sentencia->execute()) 
        return true;
      printf("Error: %s.\n", $sentencia->error); return false;
    }//function

    public function delete(){
      $consulta = 'DELETE FROM '.$this->table.' WHERE m_id = :id'; 
      $sentencia = $this->conn->prepare($consulta);

      $this->id = htmlspecialchars(strip_tags($this->id));

      $sentencia->bindParam(':id', $this->id);

      if($sentencia->execute())
        return true;
      printf("Error: %s.\n", $sentencia->error); return false;
    }//function
  }//class
?>
