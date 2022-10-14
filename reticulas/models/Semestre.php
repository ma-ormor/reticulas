<?php
  class Semestre{
    private $conn; 
    private $table = 'semestre';
    
    public $carrera; 
    public $materia;
    public $numero;

    public function __construct($db){
      $this->conn = $db;
    }//builder
    
    public function read(){
      $consulta = 'SELECT c_id, m_id, s_numero FROM '.$this->table;
      $sentencia = $this->conn->prepare($consulta); 
      $sentencia->execute();     
      return $sentencia;
    }//read

    public function create(){
      $consulta = '
        INSERT INTO '.$this->table.' SET 
          c_id = :carrera, 
          m_id = :materia, 
          s_numero = :numero
      '; 
      $sentencia = $this->conn->prepare($consulta);

      $this->carrera = htmlspecialchars(strip_tags($this->carrera));
      $this->materia = htmlspecialchars(strip_tags($this->materia));
      $this->numero = htmlspecialchars(strip_tags($this->numero));

      $sentencia->bindParam(':carrera', $this->carrera);
      $sentencia->bindParam(':materia', $this->materia);
      $sentencia->bindParam(':numero', $this->numero);

      if($sentencia->execute()) 
        return true;
      printf("Error: %s.\n", $sentencia->error); return false;
    }//function

    public function update(){
      $consulta = '
        UPDATE '.$this->table.' SET 
          s_numero = :numero
        WHERE c_id = :carrera AND m_id = :materia
      ';
      $sentencia = $this->conn->prepare($consulta);
      
      $this->carrera = htmlspecialchars(strip_tags($this->carrera));
      $this->materia = htmlspecialchars(strip_tags($this->materia));
      $this->numero = htmlspecialchars(strip_tags($this->numero));
      
      $sentencia->bindParam(':carrera', $this->carrera);
      $sentencia->bindParam(':materia', $this->materia);
      $sentencia->bindParam(':numero', $this->numero);
      
      if($sentencia->execute()) 
        return true;
      printf("Error: %s.\n", $sentencia->error); return false;
    }//function

    public function delete(){
      $consulta = '
        DELETE FROM '.$this->table.' WHERE 
          c_id = :carrera AND m_id = :materia'; 
      $sentencia = $this->conn->prepare($consulta);

      $this->carrera = htmlspecialchars(strip_tags($this->carrera));
      $this->materia = htmlspecialchars(strip_tags($this->materia));

      $sentencia->bindParam(':carrera', $this->carrera);
      $sentencia->bindParam(':materia', $this->materia);

      if($sentencia->execute())
        return true;
      printf("Error: %s.\n", $sentencia->error); return false;
    }//function
  }//class
?>
