<?php 
include_once '../../config/Database.php';
include_once '../../models/Materia.php';

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

$db = new Database();
$conexion = $db->connect();
$materia = new Materia($conexion);
$datos = json_decode(file_get_contents("php://input"));

$materia->id = $datos->id;
$materia->nombre = $datos->nombre;
$materia->hTeoria = $datos->h_teoria;
$materia->hPractica = $datos->h_practica;
$materia->hTotal = $datos->h_total;

if($materia->update())
  echo json_encode(
    array('message' => 'Materia actualizada'));
else echo json_enconde(
    array('message' => 'Materia no actualizada'));
?>