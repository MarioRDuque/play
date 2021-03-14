<?php
try {
  try {
    $seleccion = $_POST['seleccion'];
    $punto = $_POST['punto'];
    $filtros = json_decode($_POST['filtros']);

    include_once "utiles/base_de_datos.php";


    foreach ($filtros as &$valor) {
      $query = "select * from puntajes where mesa = '" . $valor->mesa . "'";
      $conexion = pg_connect("host=" . $rutaServidor . " port=" . $puerto . " dbname=" . $nombreBaseDeDatos . " user=" . $usuario . " password=" . $clave . "") or die('Error al conectar con la base de datos: ' . pg_last_error());
      $resource = pg_Exec($conexion, $query);
      $resultado = pg_fetch_object($resource);

      if ($resultado) {
        //update
        $sentencia = $base_de_datos->prepare("UPDATE puntajes SET (puntaje) = (?) WHERE mesa = '$valor->mesa'");
        $resultado = $sentencia->execute([$resultado->puntaje + $punto]);
      } else {
        //insert
        $sentencia = $base_de_datos->prepare("INSERT INTO puntajes(mesa, puntaje) VALUES (?, ?);");
        $resultado = $sentencia->execute([$valor->mesa, $punto]);
      }
    }

    if ($resultado == true) {
      echo $resultado;
    } else {
      echo "Ocurrió un error al finalizar la pregunta.";
    }
  } catch (Exception $th) {
    echo "Ocurrió un error al finalizar la pregunta.";
  }
} catch (Exception $th) {
  echo "Ocurrió un error al finalizar la pregunta.";
}
