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

  <div class="header p-4 text-right">
    <img src="utiles/logo.png" height="100" width="100" alt="">
  </div>

  <div class="container pt-5">
    <div class="row card">
      <div class="card-header col-md-12">
        <h3>Lista De Resultados</h3>
      </div>
      <body>
        <div class="table-responsive">
          <table class="table table-bordered mb-0">
            <thead class="thead-dark">
              <tr>
                <th>MESA</th>
                <th>RESPUESTA</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($resultados as $resultado) { ?>
                <tr>
                  <td><?php echo $resultado->mesa ?></td>
                  <td><?php echo $resultado->respuesta ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </body>
    </div>
  </div>
  <br><br>
</body>

</html>