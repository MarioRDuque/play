<?php

?>
<?php
$mesa = $_POST["mesa"];
if (!isset($_POST["mesa"]) || !isset($_POST["respuesta"])) {
  header("Location: $mesa.php?responder=true");
  exit();
}

try {
  try {
    include_once "utiles/base_de_datos.php";
    $respuesta = $_POST["respuesta"];
    $fecha = date("Y-m-d H:i:s");
    $sentencia = $base_de_datos->prepare("INSERT INTO resultados(mesa, respuesta, fecha) VALUES (?, ?, ?);");
    $resultado = $sentencia->execute([$mesa, $respuesta, $fecha]);
    if ($resultado == true) {
      header("Location: $mesa.php");
    } else {
      header("Location: $mesa.php?error=ResultadoFalseDeBaseDeDatos");
    }
  } catch (Exception $th) {
    header("Location: $mesa.php?error=ErrorDesconocido");
  }
} catch (Exception $th) {
  header("Location: $mesa.php?error=ErrorDesconocido");
}

?>