<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/fontawesome-all.min.css">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
        <?php
            $archivo = basename($_SERVER['PHP_SELF']);
            $pagina = str_replace(".php", "", $archivo);
            if($pagina == 'invitados' || $pagina == 'index'){
              echo '<link rel="stylesheet" href="css/colorbox.css">';
            } else if($pagina == 'conferencia') {
              echo '<link rel="stylesheet" href="css/lightbox.css">';
            }
        ?>
        <link rel="stylesheet" href="css/main.css?v=0.0.4">
        <link rel="stylesheet" href="css/colorbox.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body class="<?php echo $pagina; ?>">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <header class="site-header">
    <div class="hero">
      <div class="contenido-header">
          <nav class="redes-sociales">
            <a href="https://www.facebook.com/PsicologiaIntegralconValores" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
            <a href="https://twitter.com/psicinesmejia" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i></a>
            <a href="https://www.youtube.com/user/psicisne" target="_blank"><i class="fab fa-youtube" aria-hidden="true"></i></a>
            <a href="https://api.whatsapp.com/send?phone=523312924902&amp;text=Hola,%20necesito%20información%20sobre%20sus%20servicios%20psicologicos" target="_blank"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
          </nav>
          <div class="informacion-evento">
            <div class="clearfix">
            <p class="fecha"><i class="fas fa-calendar-alt" aria-hidden="true"></i>09 Junio 2019</p>
            <p class="ciudad"><i class="fas fa-map-marker-alt"aria-hidden="true"></i>Guadalajara,MX</p>
          </div>

          <h1 class="nombre-sitio">PSIVAPP</h1>
          <p class="slogan">Elevando tu <span>Calidad de Vida</span></p>
          </div><!--.informacion-evento-->

      </div>
  </div><!--hero-->

</header >
<div class="barra">
  <div class="contenedor clearfix">
    <div class="logo">
      <a href="index.php">
      <img src="img/psiva.jpg" alt="Logo PSIVAPP">
    </a>
    </div>
      <div class="menu-movil">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <nav class="navegacion-principal clearfix">
        <a href="conferencia.php">Conferencias</a>
        <a href="calendario.php">Calendario</a>
        <a href="invitados.php">Invitados</a>
        <a href="login.php">Reservaciones</a>
      </nav>
      <nav class="pull-right">
        <a href="login.php?cerrar_sesion=true"><i class="fa fa-user"></i>Cerrar Sesión</a>
      </nav>
  </div><!--.contenedor-->
</div>
