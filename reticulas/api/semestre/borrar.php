<?php
include_once '../../config/Database.php';
include_once '../../models/Semestre.php';

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

$db = new Database();
$conexion = $db->connect();
$semestre = new Semestre($conexion);
$datos = json_decode(file_get_contents("php://input"));

$semestre->id = $datos->id;

if($semestre->delete())
  echo json_encode(
    array('message' => 'semestre borrado'));
else echo json_enconde(
    array('message' => 'semestre no borrado'));
?>