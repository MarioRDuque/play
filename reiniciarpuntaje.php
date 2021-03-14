<?php
try {
  try {
    include_once "utiles/base_de_datos.php";
    $sentencia = $base_de_datos->prepare("DELETE FROM puntajes");
    $resultado = $sentencia->execute();
    if ($resultado == true) {
      echo $resultado;
    } else {
      echo "Ocurrió un error al finaliar la pregunta.";
    }
  } catch (Exception $th) {
    echo "Ocurrió un error al finaliar la pregunta.";
  }
} catch (Exception $th) {
  echo "Ocurrió un error al finaliar la pregunta.";
}
