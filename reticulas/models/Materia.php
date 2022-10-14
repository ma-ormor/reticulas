<?php
  // reticulas-api/
  class Materia{
    // Base de Datos
    private $conn; 
    private $table = 'materia';

    // Atributos
    public $id; 
    // public $clave;
    public $nombre;
    public $hTeoria;
    public $hPractica;
    public $hTotal;

    public function __construct($db){
      $this->conn = $db;
    }//builder
    
    public function read(){
      $consulta = 'SELECT m_id, m_nombre, m_h_teoria, m_h_practica, m_h_total FROM '.$this->table;
      $sentencia = $this->conn->prepare($consulta); 
      $sentencia->execute();     
      return $sentencia;
    }//function

    public function create(){
      $consulta = 'INSERT INTO '.$this->table .' SET 
        m_id = :id, 
        m_nombre = :nombre, 
        m_h_teoria = :h_teoria, 
        m_h_practica = :h_practica, 
        m_h_total = :h_total'; 
      $sentencia = $this->conn->prepare($consulta);

      $this->format($sentencia);

      if($sentencia->execute()) 
        return true;
      printf("Error: %s.\n", $sentencia->error); return false;
    }//function

    public function update(){
      $consulta = 'UPDATE '.$this->table.' SET
          m_nombre = :nombre, 
          m_h_teoria = :h_teoria, 
          m_h_practica = :h_practica, 
          m_h_total = :h_total 
        WHERE m_id = :id';
      $sentencia = $this->conn->prepare($consulta);

      $this->format($sentencia);
      
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

    public function format($sentencia){
      $this->id = htmlspecialchars(strip_tags($this->id));
      $this->nombre = htmlspecialchars(strip_tags($this->nombre));
      $this->hTeoria = htmlspecialchars(strip_tags($this->hTeoria));
      $this->hPractica = htmlspecialchars(strip_tags($this->hPractica));
      $this->hTotal = htmlspecialchars(strip_tags($this->hTotal));

      $sentencia->bindParam(':id', $this->id);
      $sentencia->bindParam(':nombre', $this->nombre);
      $sentencia->bindParam(':h_teoria', $this->hTeoria);
      $sentencia->bindParam(':h_practica', $this->hPractica);
      $sentencia->bindParam(':h_total', $this->hTotal);
    }
  }//class
?>
