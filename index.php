<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultados</title>
  <link rel="stylesheet" href="utiles/bootstrap.min.css">
  <link rel="stylesheet" href="utiles/clases.css">
  <script src="utiles/jquery.js"></script>
  <script src="utiles/bootstrap.min.js"></script>
</head>

<body>

  <?php
  include_once "utiles/base_de_datos.php";
  $sentencia = $base_de_datos->query("select * from resultados");
  $resultados = $sentencia->fetchAll(PDO::FETCH_OBJ);
  ?>

  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h1>Lista De Resultados</h1>
      </div>
      <br>

      <body>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead class="thead-dark">
              <tr>
                <th>MESA</th>
                <th>RESPUESTA</th>
                <th>FECHA</th>
                <th>ESTADO</th>
              </tr>
            </thead>
            <tbody>
              <br>
              <?php foreach ($resultados as $resultado) { ?>
                <tr>
                  <td><?php echo $resultado->mesa ?></td>
                  <td><?php echo $resultado->respuesta ?></td>
                  <td><?php echo $resultado->fecha ?></td>
                  <td><?php echo $resultado->correcta ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </body>
    </div>
  </div>

</body>

</html>