<?php 
include_once('../../config/Database.php');
include_once('../../models/Carrera.php');

header('Acces-Control-Allow-Origin: *');
header('Content-Type: application/json');

$db = new Database();
$conexion = $db->connect();
$carrera = new Carrera($conexion);
$resultado = $carrera->read();

if($resultado == null)
  echo 'null';
$num = $resultado->rowCount();

if($num > 0){
  $carreras = array();
  $carreras['datos'] = array();

  while($fila = $resultado->fetch(PDO::FETCH_ASSOC)){
    extract($fila); 
    
    $carrerasItem = array(
      'id' => $c_id, 
      'nombre' => $c_nombre
    );
    
    array_push($carreras['datos'], $carrerasItem);
  }echo json_encode($carreras);
}else echo json_encode(
  array('message' => 'Sin carreras'));
?>