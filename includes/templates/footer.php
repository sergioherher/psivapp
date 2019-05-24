<footer class="site-footer">
 <div class="contenedor clearfix">
   <div class="footer-informacion">
     <h3>Sobre<span>PSIVA</span></h3>
     <p>Somos una Grupo de Psicólogos, Teólogos y Familiologos que brindan su Servicio y Profesionalismo.</p>
   </div>
   <div class="ultimos-tweets">
     <h3>ULTIMOS<span>TWEETS</span></h3>
     <a class="twitter-timeline" data-height="300" data-link-color="#fe4918" href="https://twitter.com/PsicInesMejia?ref_src=twsrc%5Etfw">Tweets by PsicInesMejia</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
   </div>
   <div class="menu">
    <h3>Redes<span>Sociales</span></h3>
    <nav class="redes-sociales">
      <a href="https://www.facebook.com/PsicologiaIntegralconValores" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
      <a href="https://twitter.com/psicinesmejia" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i></a>
      <a href="https://www.youtube.com/user/psicisne" target="_blank"><i class="fab fa-youtube" aria-hidden="true"></i></a>
    <a href="https://api.whatsapp.com/send?phone=523312924902&amp;text=Hola,%20necesito%20información%20sobre%20sus%20servicios%20psicologicos" target="_blank"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
    </nav>
   </div>
 </div>
       <p class="copyright">Todos los derechos reservados Anguiano Serrano Marco Antonio(+52)3326403563</p>
</footer>

        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/jquery.animateNumber.min.js"></script>
        <script src="js/jquery.countdown.min.js"></script>
        <script src="js/jquery.lettering.js"></script>
        <?php
           $archivo = basename($_SERVER['PHP_SELF']);
           $pagina = str_replace(".php", "", $archivo);
           if($pagina == 'invitados' || $pagina == 'index'){
             echo '<script src="js/jquery.colorbox-min.js"></script>';
             echo '<script src="js/jquery.waypoints.min.js"></script>';
           } else if($pagina == 'conferencia') {
             echo '<script src="js/lightbox.js"></script>';
           }
       ?>
        <script src="js/main.js?v=0.0.33"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
