<?php

// header('Access-Control-Allow-Origin: *');
// header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


include_once "utiles/base_de_datos.php";
$query = "select * from puntajes order by puntaje desc";

$sentencia = $base_de_datos->query($query);
$resultados = $sentencia->fetchAll(PDO::FETCH_OBJ);
echo json_encode($resultados, JSON_FORCE_OBJECT);
