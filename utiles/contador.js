
var segundos = 0;

var myVar = setInterval(myTimer, 1000);

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
  this.segundos = 0;
  this.myVar = setInterval(myTimer, 1000);
  $.ajax({
    data: {
    },
    url: 'refrescar.php',
    type: 'post',
    success: function (response) {
      console.log(response);
    }
  })
}
