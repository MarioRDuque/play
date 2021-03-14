<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultados</title>
  <link rel="stylesheet" href="utiles/bootstrap.min.css">
  <link rel="stylesheet" href="utiles/clases.css">
  <link rel="stylesheet" href="utiles/toast.css">
  <script src="utiles/jquery.js"></script>
  <script src="utiles/chart.js"></script>
  <script src="utiles/bootstrap.bundle.min.js"></script>
  <script src="utiles/toast.js"></script>
</head>

<body>
  <div class="pantalla-completa opaco" hidden id="cargando">
    <div class="content text-center" style="padding-top: 20%">
      <i class="fa fa-spinner fa-pulse fa-5x fa-fw"></i>
      <h5 style="font-size: 200px;" id="counter">Cargando...</h5>
    </div>
  </div>

  <div class="container pt-3">
    <div class="card">
      <div class="card-header pb-0">
        <div class="row">
          <div class="col-md-4">
            <h3>Respuestas</h3>
          </div>
          <div class="col-md-4 text-center">
            <div class="input-group mb-3" id="form-espera">
              <input type="number" id="contador" value="120" class="form-control">
              <span style="cursor: pointer;" class="input-group-text btn btn-primary" onclick="esperar()">Establecer Espera</span>
            </div>
            <button hidden id="refresh" type="button" onclick="refrescar()" class="btn btn-sm btn-success">Ver Respuestas</button>
          </div>
          <div class="col-md-4 text-right">
            <div class="dropdown">
              <button class="btn btn-sm btn-danger dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Opciones
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" style="cursor: pointer;" onclick="finalizar()">Nueva Pregunta</a></li>
                <li><a class="dropdown-item" style="cursor: pointer;" onclick="establecerRespuesta()" data-bs-toggle="modal" data-bs-target="#exampleModal">Establecer Puntaje</a></li>
                <li><a class="dropdown-item" style="cursor: pointer;" onclick="verTop10()" data-bs-toggle="modal" data-bs-target="#exampleModal">Ver Top</a></li>
                <li><a class="dropdown-item" style="cursor: pointer;" onclick="reiniciarPuntajes()">Reiniciar puntajes</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
        <div id="puntaje" class="text-center" hidden>
          <div class="mb-3">
            <label for="puntos" id="punto" class="form-label">Puntaje</label>
            <input type="type" class="form-control" id="puntos">
          </div>
          <div class="mb-3">
            <label class="form-label">Respuesta correcta</label>
            <select class="form-select form-control" id="seleccion" aria-label="Default select example">
              <option value="A">A</option>
              <option value="B">B</option>
              <option value="C">C</option>
              <option value="D">D</option>
            </select>
          </div>
          <div class='row p-1'>
            <div class='col-md-12 text-center'>
              <div id='load' hidden class='spinner-border text-success' role='status'>
                <span class='sr-only'>Loading...</span>
              </div>
            </div>
          </div>
        </div>
        <div id="top" hidden>
          <div class="table-responsive pt-3">
            <table class="table table-bordered mb-0">
              <thead class="thead-dark">
                <tr>
                  <th>MESA</th>
                  <th>PUNTAJE</th>
                </tr>
              </thead>
              <tbody id="cuerpoPuntaje">
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" onclick='aumentarPuntajes()' id="guardarCambios" class="btn btn-primary">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>

<script src="utiles/contador.js"></script>

</html>