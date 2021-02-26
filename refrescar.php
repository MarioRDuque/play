<?php

// header('Access-Control-Allow-Origin: *');
// header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


$codigo = $_POST['codigo'];

include_once "utiles/base_de_datos.php";
if ($codigo) {
  $query = "select distinct ON (mesa) mesa, respuesta, fecha from resultados WHERE respuesta = '$codigo' order by mesa, fecha desc;";
  // $query = "select * from resultados WHERE respuesta = '$codigo';";
} else {
  $query = "select distinct ON (mesa) mesa, respuesta, fecha from resultados order by mesa, fecha desc;";
}

$sentencia = $base_de_datos->query($query);
$resultados = $sentencia->fetchAll(PDO::FETCH_OBJ);
echo json_encode($resultados, JSON_FORCE_OBJECT);
