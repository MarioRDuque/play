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
  <script src="utiles/chart.js"></script>
  <script src="utiles/bootstrap.min.js"></script>
</head>

<body>

  <!-- <div class="header p-4 text-right">
    <img src="utiles/logo.png" height="60" width="60" alt="">
  </div> -->

  <div class="pantalla-completa opaco" hidden id="cargando">
    <div class="content text-center" style="padding-top: 20%">
      <i class="fa fa-spinner fa-pulse fa-5x fa-fw"></i>
      <h5 style="font-size: 200px;" id="counter">Cargando...</h5>
    </div>
  </div>

  <div class="container pt-3">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-4">
            <h3>Respuestas</h3>
          </div>
          <div class="col-md-4 text-center">
            <div class="input-group mb-3" id="form-espera">
              <input type="number" id="contador" value="120" class="form-control">
              <span style="cursor: pointer;" class="input-group-text btn btn-primary" onclick="esperar()">Establecer Espera</span>
            </div>
            <!-- <h3 id="counter"></h3> -->
            <button hidden id="refresh" type="button" onclick="refrescar()" class="btn btn-sm btn-success">Ver Respuestas</button>
          </div>
          <div class="col-md-4 text-right">
            <button type="button" class="btn btn-sm btn-danger" onclick="finalizar()">Nueva Pregunta</button>
          </div>
        </div>
      </div>

      <!-- habilitar un botón que permita colocarle los 
      segundos de espera y que esa cuenta sea regresiva y se sobreponga a todo 
      ... y cuando llegue a cero accione el efecto de "refrescar respuestas" -->

      <canvas id="myChart" width="400" height="150"></canvas>

      <body>
        <div class="text-right">
          <h3 class="pr-2" id="mesas"></h3>
        </div>
        <div class="table-responsive pt-3">
          <table class="table table-bordered mb-0">
            <thead class="thead-dark">
              <tr>
                <th>MESA</th>
                <th>RESPUESTA</th>
              </tr>
            </thead>
            <tbody id="cuerpo">
            </tbody>
          </table>
        </div>

      </body>
    </div>

  </div>
  <br><br>
</body>
<script src="utiles/contador.js"></script>

</html>