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

  <div class="header p-4 text-right">
    <img src="utiles/logo.png" height="100" width="100" alt="">
  </div>

  <div class="container pt-5">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-4">
            <h3>Lista De Resultados</h3>
          </div>
          <div class="col-md-4 text-center">
            <h3 id="counter"></h3>
            <button hidden id="refresh" type="button" onclick="refrescar()" class="btn btn-sm btn-success">Ver Respuestas</button>
          </div>
          <div class="col-md-4 text-right">
            <button type="button" class="btn btn-sm btn-danger" onclick="finalizar()">Nueva Pregunta</button>
          </div>
        </div>
      </div>

      <canvas id="myChart" width="400" height="200"></canvas>

      <body>
        <div class="table-responsive">
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


  <script>
    // var ctx = document.getElementById('myChart').getContext('2d');
    // var myChart = new Chart(ctx, {
    //   type: 'bar',
    //   data: {
    //     labels: ['A', 'B', 'C', 'D'],
    //     datasets: [{
    //       label: 'Numero de Votos',
    //       data: [12, 19, 3, 5],
    //       backgroundColor: [
    //         'rgba(255, 99, 132, 0.2)',
    //         'rgba(54, 162, 235, 0.2)',
    //         'rgba(255, 206, 86, 0.2)',
    //         'rgba(75, 192, 192, 0.2)'
    //       ],
    //       borderColor: [
    //         'rgba(255, 99, 132, 1)',
    //         'rgba(54, 162, 235, 1)',
    //         'rgba(255, 206, 86, 1)',
    //         'rgba(75, 192, 192, 1)'
    //       ],
    //       borderWidth: 1
    //     }]
    //   },
    //   options: {
    //     events: ['click'],
    //     onClick: function(c, i) {
    //       e = i[0];
    //       if (e) {
    //         var x_value = this.data.labels[e._index];
    //         $.ajax({
    //           data: {
    //             codigo: x_value
    //           },
    //           url: 'refrescar.php',
    //           type: 'post',
    //           success: function(response) {
    //             if (response) {
    //               response = $.parseJSON(response);
    //               $("#cuerpo").html("");
    //               for (var i = 0; i < response.length; i++) {
    //                 var tr = `<tr>
    //                 <td>` + response[i].mesa + `</td>
    //                 <td>` + response[i].respuesta + `</td>
    //               </tr>`;
    //                 $("#cuerpo").append(tr)
    //               }
    //             }
    //           }
    //         })
    //       }
    //     },
    //     scales: {
    //       yAxes: [{
    //         ticks: {
    //           beginAtZero: true
    //         }
    //       }]
    //     }
    //   }
    // });
  </script>
  <br><br>
</body>
<script src="utiles/contador.js"></script>

</html>