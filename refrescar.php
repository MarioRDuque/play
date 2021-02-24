<?php
include_once "utiles/base_de_datos.php";
$sentencia = $base_de_datos->query("select * from resultados");
$resultados = $sentencia->fetchAll(PDO::FETCH_OBJ);
echo json_encode ($resultados);
