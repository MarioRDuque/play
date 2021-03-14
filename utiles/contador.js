
var segundos = 0;

var ctx = document.getElementById('myChart').getContext('2d');

var resultados = [];
var myChart;

var myVar;
refrescar();

function myTimer() {
  this.segundos--;
  document.getElementById("counter").innerHTML = segundos;
  if (this.segundos == 0) {
    clearInterval(this.myVar);
    document.getElementById("refresh").hidden = false;
    document.getElementById("cargando").hidden = true;
    document.getElementById("form-espera").hidden = true;
  }
}

function finalizar() {
  clearInterval(this.myVar);
  document.getElementById("refresh").hidden = true;
  document.getElementById("form-espera").hidden = false;
  $.ajax({
    data: {
    },
    url: 'eliminar.php',
    type: 'post',
    success: function (response) {
      refrescar();
    }
  })
}

function reiniciarPuntajes() {
  $.ajax({
    data: {
    },
    url: 'reiniciarpuntaje.php',
    type: 'post',
    success: function (response) {
      if (response == 1) {
        toastr.success("Se reiniciaron los puntajes.");
      } else {
        toastr.warning(response);
      }
    }
  })
}

function refrescar() {
  clearInterval(this.myVar);
  var data = [0, 0, 0, 0];
  this.segundos = 0;
  // this.myVar = setInterval(myTimer, 1000);
  $.ajax({
    data: {
      "codigo": null
    },
    dataType: "json",
    url: 'refrescar.php',
    type: 'post',
    success: (response) => {
      if (response) {
        response = Object.values(response);
        this.resultados = response;
        $("#cuerpo").html("");
        document.getElementById("mesas").innerHTML = "Mesas Participantes: " + response.length;
        for (var i = 0; i < response.length; i++) {
          switch (response[i].respuesta) {
            case "A":
              data[0]++;
              break;
            case "B":
              data[1]++;
              break;
            case "C":
              data[2]++;
              break;
            case "D":
              data[3]++;
              break;
            default:
              break;
          }
          var tr = `<tr>
          <td>`+ response[i].mesa + `</td>
          <td>`+ response[i].respuesta + `</td>
          </tr>`;
          $("#cuerpo").append(tr);
        }
        construirChart(data);
      }
    }
  });

  function construirChart(data) {
    this.myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['A', 'B', 'C', 'D'],
        datasets: [{
          label: 'Numero de Votos',
          data: data,
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        events: ['click'],
        onClick: (c, i) => {
          e = i[0];
          if (e) {
            var x_value = this.myChart.data.labels[e._index];
            if (resultados) {
              var filtros = this.resultados.filter(item => item.respuesta == x_value);
              if (filtros) {
                $("#cuerpo").html("");
                for (var i = 0; i < filtros.length; i++) {
                  var tr = `<tr>
                          <td>` + filtros[i].mesa + `</td>
                          <td>` + filtros[i].respuesta + `</td>
                        </tr>`;
                  $("#cuerpo").append(tr)
                }
              }
            }
          }
        },
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  }

}

function esperar() {
  this.segundos = document.getElementById("contador").value;
  if (this.segundos > 0) {
  } else {
    this.segundos = 60;
  }
  document.getElementById("cargando").hidden = false;
  document.getElementById("counter").innerHTML = segundos;
  this.myVar = setInterval(myTimer, 1000);
}

function establecerRespuesta() {
  document.getElementById("load").hidden = true;
  document.getElementById("guardarCambios").hidden = false;
  var titulo = document.getElementById("exampleModalLabel");
  if (titulo) {
    document.getElementById("exampleModalLabel").innerHTML = "Establecer Puntaje";
  }
  document.getElementById("puntaje").hidden = false;
  document.getElementById("top").hidden = true;
}

function verTop10() {
  document.getElementById("load").hidden = true;
  document.getElementById("guardarCambios").hidden = true;
  var titulo = document.getElementById("exampleModalLabel");
  if (titulo) {
    document.getElementById("exampleModalLabel").innerHTML = "Ver Top 10";
  }
  document.getElementById("top").hidden = false;
  document.getElementById("puntaje").hidden = true;

  $.ajax({
    data: {},
    dataType: "json",
    url: 'top10.php',
    type: 'post',
    success: (response) => {
      if (response) {
        response = Object.values(response);
        $("#cuerpoPuntaje").html("");
        for (var i = 0; i < response.length; i++) {
          var tr = `<tr>
          <td>`+ response[i].mesa + `</td>
          <td>`+ response[i].puntaje + `</td>
          </tr>`;
          $("#cuerpoPuntaje").append(tr);
        }
      }
    }
  });

}

function aumentarPuntajes() {
  var seleccion = document.getElementById("seleccion").value;
  var punto = document.getElementById("puntos").value;
  if (seleccion && punto) {
    var filtros = this.resultados.filter(item => item.respuesta == seleccion);
    if (filtros && filtros.length > 0) {
      document.getElementById("load").hidden = false;
      document.getElementById("guardarCambios").hidden = true;
      $.ajax({
        data: {
          seleccion: seleccion,
          punto: punto,
          filtros: JSON.stringify(filtros)
        },
        dataType: "json",
        url: 'aumentarpuntaje.php',
        type: 'post',
        success: function (response) {
          if (response == 1) {
            toastr.success("Se actualizaron los puntajes.");
            finalizar();
            verTop10();
          } else {
            toastr.warning(response);
          }
        }
      })
    } else {
      toastr.warning('Nadie respondió con la alternativa: ' + seleccion)
    }
  } else {
    toastr.warning('Complete la información');
  }
}
