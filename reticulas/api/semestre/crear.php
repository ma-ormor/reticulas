<?php
include_once '../../config/Database.php';
include_once '../../models/Semestre.php';

header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json'); 
header('Access-Control-Allow-Methods: POST'); 
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With'); 

$db = new Database();
$conexion = $db->connect();
$semestre = new Semestre($conexion);
$datos = json_decode(file_get_contents("php://input"));

$semestre->carrera = $datos->carrera;
$semestre->materia = $datos->materia;
$semestre->numero = $datos->semestre;

if($semestre->create())
  echo json_encode(
    array('message' => 'semestre creado'));
else echo json_enconde(
    array('message' => 'semestre no creado'));
?>