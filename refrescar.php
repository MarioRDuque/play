<?php

// header('Access-Control-Allow-Origin: *');
// header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


$codigo = $_POST['codigo'];

include_once "utiles/base_de_datos.php";
if ($codigo) {
  $query = "select * from resultados WHERE respuesta = '$codigo';";
} else {
  $query = "select * from resultados";
}

$sentencia = $base_de_datos->query($query);
$resultados = $sentencia->fetchAll(PDO::FETCH_OBJ);
echo json_encode($resultados);
