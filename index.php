<?php include_once 'includes/templates/header.php'; ?>

    <section class="seccion contenedor">
      <h2>Conferencias Y Asesorias Psicologicas en Jalisco</h2>
      <p>Es una empresa dedicada y comprometida con la salud mental, bienestar y estabilidad emocional, ademas de vivir los valores familiares. Fomentando con esto la unidad e integridad de las personas elevando su calidad de vida.</p>
    </section><!--seccion-->

    <section class="programa">
      <div class="contenedor-video">
        <video autoplay loop poster="img/bg-talleres.jpg">
          <source src="video/video.mp4" type="video/mp4">
          <source src="video/video.webm" type="video/webm">
          <source src="video/video.ogv" type="video/ogg">
        </video>
      </div><!--contenedor-video-->
      <div class="contenido-programa">
        <div class="contenedor">
          <div class="programa-evento">
            <h2>Programa del Evento</h2>
            <?php
                          try {
                            require_once('includes/funciones/bd_conexion.php');
                            $sql = "SELECT * FROM `categoria_evento` ";
                            $resultado = $conn->query($sql);
                          } catch (Exception $e) {
                            $error = $e->getMessage();
                          }
                       ?>
                      <nav class="menu-programa">
                        <?php while($cat = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                          <?php $categoria = $cat['cat_evento']; ?>
                              <a href="#<?php echo strtolower($categoria) ?>">
                                    <i class="fa <?php echo $cat['icono'] ?>" aria-hidden="true"></i> <?php echo $categoria ?>
                              </a>
                        <?php } ?>
                      </nav>

                      <?php
                          try {
                            require_once('includes/funciones/bd_conexion.php');
                            $sql = "SELECT `evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `cat_evento`, `nombre_invitado`, `apellido_invitado` ";
                            $sql .= "FROM `eventos` ";
                            $sql .= "INNER JOIN `categoria_evento` ";
                            $sql .= "ON eventos.id_cat_evento=categoria_evento.id_categoria ";
                            $sql .= "INNER JOIN `invitados` ";
                            $sql .= "ON eventos.id_inv=invitados.invitado_id ";
                            $sql .= "AND eventos.id_cat_evento = 1 ";
                            $sql .= "ORDER BY `evento_id` LIMIT 2;";
                            $sql .= "SELECT `evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `cat_evento`, `nombre_invitado`, `apellido_invitado` ";
                            $sql .= "FROM `eventos` ";
                            $sql .= "INNER JOIN `categoria_evento` ";
                            $sql .= "ON eventos.id_cat_evento=categoria_evento.id_categoria ";
                            $sql .= "INNER JOIN `invitados` ";
                            $sql .= "ON eventos.id_inv=invitados.invitado_id ";
                            $sql .= "AND eventos.id_cat_evento = 2 ";
                            $sql .= "ORDER BY `evento_id` LIMIT 2;";
                            $sql .= "SELECT `evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `cat_evento`, `nombre_invitado`, `apellido_invitado` ";
                            $sql .= "FROM `eventos` ";
                            $sql .= "INNER JOIN `categoria_evento` ";
                            $sql .= "ON eventos.id_cat_evento=categoria_evento.id_categoria ";
                            $sql .= "INNER JOIN `invitados` ";
                            $sql .= "ON eventos.id_inv=invitados.invitado_id ";
                            $sql .= "AND eventos.id_cat_evento = 3 ";
                            $sql .= "ORDER BY `evento_id` LIMIT 2;";
                          } catch (Exception $e) {
                            $error = $e->getMessage();
                          }
                       ?>

                      <?php $conn->multi_query($sql); ?>

                      <?php
                          do {
                              $resultado = $conn->store_result();
                              $row = $resultado->fetch_all(MYSQLI_ASSOC);    ?>

                              <?php $i = 0; ?>
                              <?php foreach($row as $evento): ?>
                                <?php if($i % 2 == 0) { ?>
                                  <div id="<?php echo strtolower($evento['cat_evento']) ?>" class="info-curso ocultar clearfix">
                                <?php } ?>
                                        <div class="detalle-evento">
                                            <h3><?php echo html_entity_decode($evento['nombre_evento']) ?></h3>
                                            <p><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $evento['hora_evento']; ?></p>
                                            <p><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $evento['fecha_evento']; ?></p>
                                            <p><i class="fa fa-user" aria-hidden="true"></i> <?php echo $evento['nombre_invitado'] . " " .  $evento['apellido_invitado']; ?></p>
                                        </div>
                                <?php if($i % 2 == 1): ?>
                                      <a href="calendario.php" class="button float-right">Ver todos</a>
                                  </div> <!--#talleres-->
                                <?php endif; ?>
                              <?php $i++; ?>
                              <?php endforeach; ?>
                              <?php $resultado->free(); ?>
                        <?php  } while ($conn->more_results() && $conn->next_result());?>

          </div><!--.programa-evento-->
        </div><!--.contenedor-->
      </div><!--.contenido-programa-->
    </section><!--.programa-->

    <?php include_once "includes/templates/invitados.php"; ?>

    <div class="contador parallax">
      <div class="contenedor">
        <ul class="resumen-evento clearfix">
          <li><p class="numero">0</p> Invitados</li>
          <li><p class="numero">0</p> Talleres</li>
          <li><p class="numero">0</p> Días</li>
          <li><p class="numero">0</p> Conferencias</li>
        </ul>
      </div>
    </div><!--.contador-->

    <section class="precios sesion">
      <h2>Precios</h2>
      <div class="contenedor">
        <ul class="lista-precios clearfix">
          <li>
            <div class="tabla-precio">
              <h3>Pase por día</h3>
              <p class="numero">$30</p>
              <ul>
                <li>3 Conferencias</li>
                <li>5 Talleres</li>
                <li>Bocadillos Gratis</li>
              </ul>
              <a href="#" class="button hollow">Comprar</a>
            </div>
          </li>
          <li>
            <div class="tabla-precio">
              <h3>Todos los días</h3>
              <p class="numero">$50</p>
              <ul>
                <li>Todas las Conferencias</li>
                <li>Todas los Talleres</li>
                <li>Bocadillos Gratis</li>
              </ul>
              <a href="#" class="button">Comprar</a>
            </div>
          </li>
          <li>
            <div class="tabla-precio">
              <h3>Pase por 2 día</h3>
              <p class="numero">$45</p>
              <ul>
                <li>6 Conferencias</li>
                <li>10 Talleres</li>
                <li>Bocdillos Gratis</li>
              </ul>
              <a href="#" class="button hollow">Comprar</a>
            </div>
          </li>
        </ul>
      </div>
    </section><!--.precios-->

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3733.977044277231!2d-103.26477575077348!3d20.629792486148194!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428b47ee855de67%3A0x6ac1d26a7a9a9033!2sPoncitlan+Sur+7885B%2C+Loma+Dorada+Delegaci%C3%B3n+B%2C+45418+Tonal%C3%A1%2C+Jal.!5e0!3m2!1ses-419!2smx!4v1556567573157!5m2!1ses-419!2smx" width="1340" height="420" frameborder="0" style="border:0" allowfullscreen></iframe>

    <section class="seccion">

    <h2>Testimoniales</h2>

    <div class="testimoniales contenedor clearfix">

     <div class="testimonial">

     <blockquote>

    <p>PSIVAPP se encargara de tener un acercamiento y una vista comprometida con cada paciente y usuario</p>

      <footer class="info-testimonial">

      <img src="img/testimonial.jpg" alt="Fundadora">

        <cite>Ines Mejia<span>Licenciatura en Psicologia</span></cite>

     </footer>

     </blockquote>

    </div><!--.Testimonial-->

    <div class="testimonial">

    <blockquote>

     <p>Nuestro deseo de tener un control en nuestras conferencias y seminarios ahora tendra una vista increible</p>

       <footer class="info-testimonial">

        <img src="img/testimonial2.jpg" alt="Fundador">

         <cite>Ivan Toscano<span>Licenciatura en Psicologia</span></cite>

       </footer>

     </blockquote>

    </div><!--.Testimonial-->

    <div class="testimonial">

     <blockquote>

    <p>Este dia sera importante en la organizacion, pasamos de los modos tradicionales aun compromiso por Internet</p>

        <footer class="info-testimonial">

       <img src="img/testimonial3.jpg" alt="Fundadora 2 ">

          <cite>Beatriz Serrano<span>Licenciatura en Psicologia</span></cite>

       </footer>

    </blockquote>

     </div><!--.Testimonial-->

    </div>

    </section>



    <div class="newsletter parallax">
      <div class="contenido contenedor clearfix">
        <p>contactanos:</p>
        <h3>PSIVAPP</h3>
        <a href="#mc_embed_signup" class="boton_newsletter button transparente">Registro</a>
      </div><!--.contenido-->
    </div><!--.newsletter-->

    <section class="seccion">
      <h2>Faltan</h2>
      <div class="cuenta-regresiva contenedor">
        <ul class="clearfix">
          <li><p id="dias" class="numero"></p> Días</li>
          <li><p id="horas" class="numero"></p> Horas</li>
          <li><p id="minutos" class="numero"></p> Minutos</li>
          <li><p id="segundos" class="numero"></p> Segundos</li>
        </ul>
      </div>
    </section>

<?php include_once 'includes/templates/footer.php'; ?>
