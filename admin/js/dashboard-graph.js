$(document).ready(function () {
  
  $.getJSON('servicio-registrados.php', function(data) {
      var line = new Morris.Line({
        element: 'grafica-registros',
        resize: true,
        data: data,
        xkey: 'fecha',
        ykeys: ['cantidad'],
        labels: ['Item 1'],
        lineColors: ['#3c8dbc'],
        hideHover: 'auto'
      });
  });


})