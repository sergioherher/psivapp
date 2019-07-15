<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>PSIVA | Elevando tu calidad de vida</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/fontawesome-all.min.css">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans" rel="stylesheet">
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" /> -->
        <link rel="stylesheet" href="css/materialize.min.css"/>
        <link rel="stylesheet" href="css/nprogress.css?v=0.0.3"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
        <?php
            $archivo = basename($_SERVER['PHP_SELF']);
            $pagina = str_replace(".php", "", $archivo);
            if($pagina == 'invitados' || $pagina == 'index'){
              echo '<link rel="stylesheet" href="css/colorbox.css">';
            } else if($pagina == 'conferencia') {
              echo '<link rel="stylesheet" href="css/lightbox.css">';
            }
        ?>
        <link rel="stylesheet" href="css/main.css?v=0.0.49">
        <link rel="stylesheet" href="css/colorbox.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body class="<?php echo $pagina; ?>">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Add your site or application content here -->
    <!-- 
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
            </div>

        </div>
      </div>
    </header >
    -->

    <!-- <div class="barra">
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
            <?php //if(isset($_SESSION['usuario_cliente'])) { ?>
            <a href="login.php?cerrar_sesion=true"><i class="fa fa-user"></i> Cerrar Sesión</a>
            <?php //} ?>
            <a href="login.php">Reservaciones</a>
          </nav>
      </div>
    </div> -->
    <nav>
      <div class="nav-wrapper blue-grey darken-4">
        <a href="index.php" class="brand-logo"><img src="img/psiva_new.png" height="45px" alt="Logo PSIVAPP"></a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="conferencia.php" class="item <?php if($pagina == "conferencia") { ?>activated<?php } ?>">Conferencias</a></li>
          <li><a href="calendario.php" class="item <?php if($pagina == "calendario") { ?>activated<?php } ?>">Calendario</a></li>
          <li><a href="invitados.php" class="item <?php if($pagina == "invitados") { ?>activated<?php } ?>">Invitados</a></li>
          <li><a href="login.php" class="item <?php if($pagina == "login") { ?>activated<?php } ?>"><span class="note">Reservaciones</span></a></li>
          <?php if(isset($_SESSION['usuario_cliente'])) { ?>
            <li><a href="login.php?cerrar_sesion=true" class="item <?php if($pagina == "login") { ?> activated <?php } ?>"><i class="fa fa-user"></i> Cerrar Sesión</a></li>
          <?php } ?>
        </ul>
      </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
      <li><a href="conferencia.php">Conferencias</a></li>
      <li><a href="calendario.php">Calendario</a></li>
      <li><a href="invitados.php">Invitados</a></li>
      <li><a href="login.php">Reservaciones</a></li>
      <?php if(isset($_SESSION['usuario_cliente'])) { ?>
        <li><a href="login.php?cerrar_sesion=true"><i class="fa fa-user"></i> Cerrar Sesión</a></li>
      <?php } ?>
    </ul>
