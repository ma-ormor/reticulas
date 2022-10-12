<?php
include_once '../../config/Database.php';
include_once '../../models/Carrera.php';

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

$db = new Database();
$conexion = $db->connect();
$carrera = new Carrera($conexion);
$datos = json_decode(file_get_contents("php://input"));

$carrera->id = $datos->id;

if($carrera->delete())
  echo json_encode(
    array('message' => 'carrera borrada'));
else echo json_enconde(
    array('message' => 'carrera no borrada'));
?>