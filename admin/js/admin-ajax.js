$(document).ready(function() {
    $('#guardar-registro').on('submit', function(e) {
            e.preventDefault();
            
            var datos = $(this).serializeArray();
            
            $.ajax({
                type: $(this).attr('method'),
                data: datos,
                url: $(this).attr('action'),
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    var resultado = data;
                    if(resultado.respuesta == 'exito') {
                        swal(
                          'Correcto',
                          'Se guardó correctamente',
                          'success'
                        )
                    } else {
                        swal(
                          'Error!',
                          'Hubo un error',
                          'error'
                        )
                    }
                }
            })
    });
    // Se ejecuta cuando hay un archivo
    
    
    $('#guardar-registro-archivo').on('submit', function(e) {
            e.preventDefault();
            
            var datos = new FormData(this);
            
            $.ajax({
                type: $(this).attr('method'),
                data: datos,
                url: $(this).attr('action'),
                dataType: 'json',
                contentType: false,
                processData : false,
                async: true,
                cache: false,
                success: function(data) {
                    console.log(data);
                    var resultado = data;
                    if(resultado.respuesta == 'exito') {
                        swal(
                          'Correcto',
                          'Se guardó correctamente',
                          'success'
                        )
                    } else {
                        swal(
                          'Error!',
                          'Hubo un error',
                          'error'
                        )
                    }
                }
            })
    });
    
    
    
    // Eliminar un registro
    
    $('.borrar_registro').on('click', function(e) {
        e.preventDefault();
        
        var id = $(this).attr('data-id');
        var tipo = $(this).attr('data-tipo');
        
        swal({
          title: '¿Estás seguro?',
          text: "Un registro eliminado no se puede recuperar",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, Eliminar!',
          cancelButtonText: 'Cancelar'
        }).then(function () {
                $.ajax({
                    type:'post',
                    data: {
                        id : id,
                        registro : 'eliminar'
                    },
                    url: 'modelo-'+tipo+'.php',
                    success:function(data) {
                        console.log(data);
                        var resultado = JSON.parse(data);
                        if(resultado.respuesta2 == 'exito') {
                            swal(
                              'Eliminado!',
                              'Registro Eliminado.',
                              'success'
                            )
                            jQuery('[data-id="'+ resultado.id_eliminado +'"]').parents('tr').remove();
                        } else {
                            swal(
                              'Error!',
                              'No se pudo eliminar',
                              'error'
                            )
                        }
                        
                    }
                })
        });
    });

    // Marcar pago
    
    $('.marcar_pago').on('click', function(e) {
        e.preventDefault();
        
        var id = $(this).attr('data-id');
        var tipo = $(this).attr('data-tipo');
        var pagado = $(this).attr('data-pagado');
        var contenido_swal;

        if(pagado == 0) {
          contenido_swal = {
            title: '¿Estás seguro de querer marcar como no pagado este registro?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, No Pagado!',
            cancelButtonText: 'Cancelar'
          };
        } else {
          contenido_swal = {
            title: '¿Estás seguro de querer marcar como pagado este registro?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Pagado!',
            cancelButtonText: 'Cancelar'
          };
        }
        
        swal(contenido_swal).then(function () {
                $.ajax({
                    type:'post',
                    data: {
                        id : id,
                        registro : 'pagado',
                        pagado: pagado
                    },
                    url: 'modelo-'+tipo+'.php',
                    success:function(data) {
                        console.log(data);
                        var resultado = JSON.parse(data);
                        if(resultado.respuesta == 'exito') {
                            
                            if(resultado.pagado == 1) {
                              swal(
                                'Cambió a pagado!',
                                'Pago actualizado.',
                                'success'
                              )
                              $('.cambiar-estado-pago-'+resultado.id_pagado).removeClass('bg-green').addClass('bg-red').attr('data-pagado', 0).attr('title','Cambiar a no pagado');
                              $('.cambiar-estado-pago-'+resultado.id_pagado+' i').removeClass('fa-dollar').addClass('fa-times');
                              $('.badge-estado-pago-'+resultado.id_pagado).removeClass('bg-red').addClass('bg-green').html("Pagado");
                            } else {
                              swal(
                                'Cambió a no pagado!',
                                'Pago actualizado.',
                                'success'
                              )
                              $('.cambiar-estado-pago-'+resultado.id_pagado).removeClass('bg-red').addClass('bg-green').attr('data-pagado', 1).attr('title','Cambiar a pagado');
                              $('.cambiar-estado-pago-'+resultado.id_pagado+' i').removeClass('fa-times').addClass('fa-dollar');
                              $('.badge-estado-pago-'+resultado.id_pagado).removeClass('bg-green').addClass('bg-red').html("No Pagado");
                            }
                        } else {
                            swal(
                              'Error!',
                              'No se pudo actualizar',
                              'error'
                            )
                        }
                        
                    }
                })
        });
    });
    
    
});