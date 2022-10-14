<?php 
include_once('../../config/Database.php');
include_once('../../models/Materia.php');

header('Acces-Control-Allow-Origin: *');
header('Content-Type: application/json');

$db = new Database();
$conexion = $db->connect();
$materia = new Materia($conexion);
$resultado = $materia->read();

if($resultado == null)
  echo 'null';
$num = $resultado->rowCount();

if($num > 0){
  $materias = array();
  $materias['datos'] = array();

  while($fila = $resultado->fetch(PDO::FETCH_ASSOC)){
    extract($fila); 
    
    $materiasItem = array(
      'id' => $m_id, 
      'nombre' => $m_nombre,
      'horasteoria' => $m_h_teoria,
      'horaspractica' => $m_h_practica,
      'horastotal' => $m_h_total
    );
    
    array_push($materias['datos'], $materiasItem);
  }//print_r($materias);
  echo json_encode($materias['datos']);
}else echo json_encode(
  array('message' => 'Sin materias'));
?>