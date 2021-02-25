
var segundos = 0;

var ctx = document.getElementById('myChart').getContext('2d');

var myVar = setInterval(myTimer, 1000);
refrescar();

function myTimer() {
  this.segundos++;
  document.getElementById("counter").innerHTML = segundos;
  if (this.segundos == 60) {
    clearInterval(this.myVar);
    document.getElementById("refresh").hidden = false;
    document.getElementById("counter").hidden = true;
  }
}

function finalizar() {
  clearInterval(this.myVar);
  this.segundos = 0;
  this.myVar = setInterval(myTimer, 1000);
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

function refrescar() {
  clearInterval(this.myVar);
  var data = [0, 0, 0, 0];
  this.segundos = 0;
  this.myVar = setInterval(myTimer, 1000);
  $.ajax({
    data: {
      "codigo": null
    },
    url: 'refrescar.php',
    type: 'post',
    success: (response) => {
      if (response) {
        response = $.parseJSON(response);
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
    var myChart = new Chart(ctx, {
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
        onClick: function (c, i) {
          e = i[0];
          if (e) {
            var x_value = this.data.labels[e._index];
            $.ajax({
              data: {
                codigo: x_value
              },
              url: 'refrescar.php',
              type: 'post',
              success: function (response) {
                if (response) {
                  response = $.parseJSON(response);
                  $("#cuerpo").html("");
                  for (var i = 0; i < response.length; i++) {
                    var tr = `<tr>
                        <td>` + response[i].mesa + `</td>
                        <td>` + response[i].respuesta + `</td>
                      </tr>`;
                    $("#cuerpo").append(tr)
                  }
                }
              }
            })
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
