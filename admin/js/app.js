$(document).ready(function () {
      $('.sidebar-menu').tree()
      


      $('#registros').DataTable({
        'paging'      : true,
        'pageLength'  : 10,
        'lengthChange': false,
        'searching'   : true,
        'ordering'    : false,
        'info'        : true,
        'autoWidth'   : false,
        'language' : {
            paginate: {
                next: 'Siguiente',
                previous: 'Anterior',
                last: 'Último',
                first: 'Primero'
            },
            info: 'Mostrando _START_ a _END_ de _TOTAL_ resultados',
            emptyTable: 'No hay registros',
            infoEmpty: '0 Registros',
            search: 'Buscar: '
        }
    });
    
    $('#crear_registro_admin').attr('disabled', true);
    
    $('#repetir_password').on('input', function() {
        var password_nuevo = $('#password').val();
        
        if($(this).val() == password_nuevo ) {
            $('#resultado_password').text('Correcto');
            $('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
            $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
            $('#crear_registro_admin').attr('disabled', false);
        } else {
            $('#resultado_password').text('No son iguales!');
            $('#resultado_password').parents('.form-group').addClass('has-error').removeClass('has-success');
            $('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
        }
    });
      

    //Date picker
    $('#fecha').datepicker({
      autoclose: true
    });

    $('.seleccionar').select2();

    $('.timepicker').timepicker({
      showInputs: false,   
    });

    $('#icono').iconpicker();


    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass   : 'iradio_flat-blue'
  });

  if(document.getElementById('calcular')) {
      var calcular = document.getElementById('calcular');
      calcular.addEventListener('click', calcularMontos);

      var lista_productos = document.getElementById('lista-productos');
      var suma = document.getElementById('suma-total');

      var camisas =document.getElementById('camisa_evento');
      var etiquetas = document.getElementById('etiquetas');

      function calcularMontos(event){
            event.preventDefault();
            if(regalo.value === '') {
              alert("Debes elegir un regalo");
              regalo.focus();
            } else {
               var boletosDia = parseInt(pase_dia.value, 10)|| 0,
                   boletos2Dias = parseInt(pase_dosdias.value, 10)|| 0,
                   boletoCompleto = parseInt(pase_completo.value, 10)|| 0,
                   cantCamisas = parseInt(camisas.value, 10)|| 0,
                   cantEtiquetas =parseInt(etiquetas.value, 10)|| 0;


              var totalPagar = (boletosDia * 30) +  (boletos2Dias * 45) + (boletoCompleto * 50) + ((cantCamisas * 10) * .93) + (cantEtiquetas * 2);

              var listadoProductos = [];

              if(boletosDia >= 1) {
                listadoProductos.push(boletosDia + ' Pases por día');
              }
              if(boletos2Dias >= 1) {
                listadoProductos.push(boletos2Dias + ' Pases por 2 días');
              }
              if(boletoCompleto >= 1) {
                listadoProductos.push(boletoCompleto + ' Pases Completos');
              }
              if(cantCamisas >= 1) {
                listadoProductos.push(cantCamisas + ' Camisas');
              }
              if(cantEtiquetas >= 1) {
                listadoProductos.push(cantEtiquetas + ' Etiquetas');
              }
              lista_productos.style.display = "block";
              lista_productos.innerHTML = '';
              for(var i = 0; i< listadoProductos.length; i++) {
                lista_productos.innerHTML += listadoProductos[i] + '<br/>';
              }
              suma.innerHTML = "$ " + totalPagar.toFixed(2);
              document.getElementById('total_pedido').value=  totalPagar;
            }
        }
  }

})