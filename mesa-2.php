<!DOCTYPE html>
<html lang="es">


<?php
$archivo = basename(__FILE__, ".php");
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $archivo ?></title>
  <link rel="stylesheet" href="utiles/bootstrap.min.css">
  <link rel="stylesheet" href="utiles/clases.css">
  <script src="utiles/jquery.js"></script>
  <script src="utiles/bootstrap.min.js"></script>
</head>

<?php
$responder = false;
$error = false;
if ($_REQUEST) {
  if (isset($_REQUEST['responder'])) {
    $responder = $_REQUEST['responder'];
  }
  if (isset($_REQUEST['error'])) {
    $error = $_REQUEST['error'];
  }
}
?>

<body>
  <div class="header p-4 text-right">
    <img src="utiles/logo.png" height="100" width="100" alt="">
  </div>
  <div class="container p-5">
    <div class="row card">

      <div class="card-header text-uppercase">
        <?php echo $archivo ?>
      </div>

      <div class="col-md-12 text-center">
        <?php if ($error) { ?>

          <div class='alert alert-danger pt-5' role='alert' id='alerta'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            <strong>Error!</strong> $error
          </div>

        <?php } ?>
      </div>

      <?php if ($responder) { ?>

        <form action='responder.php' class='col-md-12 text-center pt-5' method="POST">

          <input type="text" hidden name="mesa" value="<?php echo $archivo ?>">

          <div class='btn-group btn-group-toggle' data-toggle='buttons'>
            <label class='btn btn-success mr-2'>
              <input type='radio' name='respuesta' id='a' value="A" autocomplete='off'> A
            </label>
            <label class='btn btn-success mr-2'>
              <input type='radio' name='respuesta' id='b' value="B" autocomplete='off'> B
            </label>
            <label class='btn btn-success mr-2'>
              <input type='radio' name='respuesta' id='c' value="C" autocomplete='off'> C
            </label>
            <label class='btn btn-success mr-2'>
              <input type='radio' name='respuesta' id='d' value="D" autocomplete='off'> D
            </label>
          </div>
          <div class='row p-5'>
            <div class='col-md-12 text-center'>
              <br>
              <br>
              <div id='cargando' hidden class='spinner-border text-success' role='status'>
                <span class='sr-only'>Loading...</span>
              </div>
              <button type='submit' id='enviar' onclick='activarCargando()' class='btn btn-primary'>Enviar Respuesta.</button>
            </div>
          </div>
        </form>

      <?php } else { ?>

        <div class="col-md-12 text-center p-5">
          <h1>Espere la siguiente pregunta.</h1>
          <br>
          <button type='button' id='continuar' onclick='continuar()' class='btn btn-primary'>Continuar.</button>
        </div>

      <?php } ?>

    </div>

    <script>
      function activarCargando() {
        document.getElementById("cargando").hidden = false;
        document.getElementById("enviar").hidden = true;
      }

      function continuar() {
        window.location.href = window.location.pathname + "?responder=true";
        window.location.reload;
      }
    </script>
  </div>


</body>

<script>
  setTimeout(function() {
    document.getElementById('alerta') ? document.getElementById('alerta').hidden = true : null;
    if (typeof window.history.pushState == 'function') {
      window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF']; ?>');
    }
  }, 8000);
</script>

</html>