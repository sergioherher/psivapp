<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="charset=UTF-8">
    <title>Registro para pago Offline</title>
    <style>
        .titulo-principal {
            text-align: center;
        }
        .datos-personales {
            width: 50%;
            display: inline-block;
            float: left;
        }
        .datos-facturacion {
            width: 50%;
            display: inline-block;
        }
        .fila {
            line-height: 35px;  
        }

        .columna-producto {
            width: 25%;
            display: inline-block;
            float: left;
        }
    </style>
</head>
<body>
    <div>
        <div>
            <div>
                <img src="img/psiva.jpg"/>
            </div>  
            <div class="titulo-principal">
                <h2>Relación para pago Offline</h2>
            </div>  
        </div>
        <hr>
        <div class="titulo-principal">
            <h4>Datos del registrado</h4>
        </div> 
        <div class="datos-registrado">
            <div class="datos-personales">
                <div class="fila">
                    Nombre: <?=$nombre?>
                </div>
                <div class="fila">
                    Apellido: <?=$apellido?>
                </div>                
                <div class="fila">
                    Email: <?=$email?>
                </div>
            </div>
            <div class="datos-facturacion">
                <div class="fila">
                    Registro: # <?=$ID_registro?>
                </div>
                <div class="fila">
                    Fecha: <?=$fecha?>
                </div> 
            </div>
        </div>
        <hr>
        <div class="titulo-principal">
            <h4>Información de productos seleccionados</h4>
        </div>  
        <div class="datos-factura">
            <div class="fila-productos">
              <div class="columna-producto"> Tipo de Boleto </div>
              <div class="columna-producto"> Cantidad </div>
              <div class="columna-producto"> Precio </div>
              <div class="columna-producto"> Total </div>
            </div>
            <?php
            $acumulado_boletos = 0;
              foreach($numero_boletos as $key => $value) {
                    if( (int) $value['cantidad'] > 0 ) {
                        ?>
                        <div class="fila-productos">
                          <div class="columna-producto"> <?=$key?> </div>
                          <div class="columna-producto"> <?=$value['cantidad']?> </div>
                          <div class="columna-producto"> $ <?=$value['precio']?> </div>
                          <div class="columna-producto"> $ <?=$value['precio']*$value['cantidad']?> </div>
                        </div>
                        <?php
                        $acumulado_boletos += $value['precio']*$value['cantidad'];
                    }
              }
            ?>
        </div>
        <hr>
        <div class="titulo-principal">
            <h4>Información de productos extras</h4>
        </div>  
        <div class="datos-factura">
            <div class="fila-productos">
              <div class="columna-producto"> Producto Extra </div>
              <div class="columna-producto"> Cantidad </div>
              <div class="columna-producto"> Precio </div>
              <div class="columna-producto"> Total </div>
            </div>
            <?php
                $acumulado_extra = 0;
                foreach($pedidoExtra as $key => $value) {
                    if( (int) $value['cantidad'] > 0 ) {
                          if($key == 'camisas') {
                              $precio = (float) $value['precio'] * .93;
                          } else {
                              $precio = (int) $value['precio'];
                          }
                        ?>
                        <div class="fila-productos">
                          <div class="columna-producto"> <?=$key?> </div>
                          <div class="columna-producto"> <?=$value['cantidad']?> </div>
                          <div class="columna-producto"> $ <?=$precio?> </div>
                          <div class="columna-producto"> $ <?=$precio*$value['cantidad']?> </div>
                        </div>
                        <?php
                        $acumulado_extra += $precio*$value['cantidad'];
                    }
              }
            ?>
        </div>
        <hr> 
        <div class="datos-factura">
            <div class="fila-productos">
                <div class="columna-producto">&nbsp;</div>
                <div class="columna-producto">&nbsp;</div>
                <div class="columna-producto">&nbsp;</div>
                <div class="columna-producto"> Total </div>
            </div>
            <div class="fila-productos">
                <div class="columna-producto">&nbsp;</div>
                <div class="columna-producto">&nbsp;</div>
                <div class="columna-producto">&nbsp;</div>
                <div class="columna-producto">$ <?=$acumulado_extra+$acumulado_boletos?> </div>
            </div>
        </div>
    </div>
</body>
</html>