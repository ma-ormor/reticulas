<?php
include_once '../../config/Database.php';
include_once '../../models/Materia.php';

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

$db = new Database();
$conexion = $db->connect();
$materia = new Materia($conexion);
$datos = json_decode(file_get_contents("php://input"));

$materia->id = $datos->id;

if($materia->delete())
  echo json_encode(
    array('message' => 'Materia borrada'));
else echo json_enconde(
    array('message' => 'Materia no borrada'));
?>