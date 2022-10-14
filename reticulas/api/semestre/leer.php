<?php 
include_once('../../config/Database.php');
include_once('../../models/Semestre.php');

header('Acces-Control-Allow-Origin: *');
header('Content-Type: application/json');

$db = new Database();
$conexion = $db->connect();
$semestre = new Semestre($conexion);
$resultado = $semestre->read();

if($resultado == null)
  echo 'null';
$num = $resultado->rowCount();

if($num > 0){
  $semestres = array();
  $semestres['datos'] = array();

  while($fila = $resultado->fetch(PDO::FETCH_ASSOC)){
    extract($fila); 
    
    $semestresItem = array(
      'id' => $c_id, 
      'nombre' => $m_id,
      'semestre' =>  $s_numero
    );
    
    array_push($semestres['datos'], $semestresItem);
  }echo json_encode($semestres);
}else echo json_encode(
  array('message' => 'Sin semestres'));
?>