<?php include_once 'includes/templates/header.php'; ?>

 <section class="seccion contenedor">
   <h2>Registro de Usuarios</h2>
   <form id="registro" class="registro" action="pagar.php" method="post">
     <div  id="datos_usuario"class="registro caja clearfix">
       <div class="campo">
         <label for="nombre">Nombre:</label>
         <input type="text" id="nombre" name="nombre" placeholder="Tu Nombre">
       </div>
       <div class="campo">
         <label for="apellido">Apellido:</label>
         <input type="text" id="apellido" name="apellido" placeholder="Tu Apellido">
       </div>
       <div class="campo">
         <label for="email">Email:</label>
         <input type="email" id="email" name="email" placeholder="Tu Email">
       </div>
       <div id="error"></div>
     </div><!--#datos_usuario-->

     <div id="paquetes" class="paquetes">
       <h3>Elige el numero de boletos</h3>
       <ul class="lista-precios clearfix">
          <li>
             <div class="tabla-precio">
               <h3>Pase por dia(Viernes)</h3>
               <p class="numero">$30</p>
               <ul>
                   <li>3 Conferencias</li>
                   <li>5 Talleres</li>
                   <li>Bocadillos gratis</li>
               </ul>
              <div class="orden">
               <label for="pase_dia">Boletos deseados:</label>
               <input type="number"  min="0" id="pase_dia" size="3" name="boletos[un_dia][cantidad]" placeholder="0">
               <input type="hidden" value="30" name="boletos[un_dia][precio]">
              </div>
             </div>
          </li>
          <li>
             <div class="tabla-precio">
               <h3>Todos los dias</h3>
               <p class="numero">$50</p>
               <ul>
                   <li>Todas las conferencias</li>
                   <li>Todos los talleres</li>
                   <li>Bocadillos gratis</li>
               </ul>
               <div class="orden">
                <label for="pase_completo">Boletos deseados:</label>
                <input type="number"  min="0" id="pase_completo" size="3"  name="boletos[completo][cantidad]" placeholder="0">
                 <input type="hidden" value="50" name="boletos[completo][precio]">
               </div>
             </div>
          </li>
          <li>
             <div class="tabla-precio">
               <h3>Pase por 2 dias(Viernes/Sabado)</h3>
               <p class="numero">45</p>
               <ul>
                   <li>6 Conferencias</li>
                   <li>10 Talleres</li>
                   <li>Bocadillos gratis</li>
               </ul>
               <div class="orden">
                <label for="pase_dosdias">Boletos deseados:</label>
                <input type="number"  min="0" id="pase_dosdias" size="3"  name="boletos[2dias][cantidad]" placeholder="0">
                 <input type="hidden" value="45" name="boletos[2dias][precio]">
               </div>
             </div>
          </li>
       </ul>
       <div id="eventos" class="eventos clearfix">
                         <h3>Elige tus talleres</h3>
                         <div class="caja">
                               <div id="viernes" class="contenido-dia clearfix">
                                   <h4>Viernes</h4>
                                       <div>
                                           <p>Talleres:</p>
                                           <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time>10:00</time> Escuela Para Padres</label>
                                           <label><input type="checkbox" name="registro[]" id="taller_02" value="taller_02"><time>12:00</time> ¿Depresion y Tristeza?</label>
                                           <label><input type="checkbox" name="registro[]" id="taller_03" value="taller_03"><time>14:00</time> Un mejor lugar</label>
                                           <label><input type="checkbox" name="registro[]" id="taller_04" value="taller_04"><time>17:00</time> Comunidad Feliz</label>
                                           <label><input type="checkbox" name="registro[]" id="taller_05" value="taller_05"><time>19:00</time> Ayuda y ayudate</label>
                                       </div>
                                       <div>
                                           <p>Conferencias:</p>
                                           <label><input type="checkbox" name="registro[]" id="conf_01" value="conf_01"><time>10:00</time> Controla Tus Impulsos</label>
                                           <label><input type="checkbox" name="registro[]" id="conf_02" value="conf_02"><time>17:00</time> Disfruta Tu Felicidad</label>
                                           <label><input type="checkbox" name="registro[]" id="conf_03" value="conf_03"><time>19:00</time> Traza tu camino</label>
                                       </div>
                                       <div>
                                           <p>Seminarios:</p>
                                           <label><input type="checkbox" name="registro[]" id="sem_01" value="sem_01"><time>10:00</time> PSIVA en comunidad</label>
                                       </div>
                               </div> <!--#viernes-->
                               <div id="sabado" class="contenido-dia clearfix">
                                   <h4>Sábado</h4>
                                   <div>
                                         <p>Talleres:</p>
                                         <label><input type="checkbox" name="registro[]" id="taller_06" value="taller_06"><time>10:00</time> Niños/Niñas mejores 2019</label>
                                         <label><input type="checkbox" name="registro[]" id="taller_07" value="taller_07"><time>12:00</time> Trabajo en comunidad</label>
                                         <label><input type="checkbox" name="registro[]" id="taller_08" value="taller_08"><time>14:00</time> Libre</label>
                                         <label><input type="checkbox" name="registro[]" id="taller_09" value="taller_09"><time>17:00</time> Ayuda y Ayudate</label>
                                         <label><input type="checkbox" name="registro[]" id="taller_10" value="taller_10"><time>19:00</time> Con Optimismo para ti</label>
                                         <label><input type="checkbox" name="registro[]" id="taller_11" value="taller_11"><time>21:00</time> ¿Quien soy?</label>
                                   </div>
                                   <div>
                                         <p>Conferencias:</p>
                                         <label><input type="checkbox" name="registro[]" id="conf_04" value="conf_04"><time>10:00</time> Un cambio por ti</label>
                                         <label><input type="checkbox" name="registro[]" id="conf_05" value="conf_05"><time>17:00</time> Problema Y Solucion</label>
                                         <label><input type="checkbox" name="registro[]" id="conf_06" value="conf_06"><time>19:00</time> El turno del cambio</label>
                                   </div>
                                   <div>
                                         <p>Seminarios:</p>
                                         <label><input type="checkbox" name="registro[]" id="sem_02" value="sem_02"><time>10:00</time> SAJUBA</label>
                                         <label><input type="checkbox" name="registro[]" id="sem_03" value="sem_03"><time>17:00</time> PSIVA en la comunidad</label>
                                   </div>
                               </div> <!--#sabado-->
                               <div id="domingo" class="contenido-dia clearfix">
                                   <h4>Domingo</h4>
                                   <div>
                                         <p>Talleres:</p>
                                         <label><input type="checkbox" name="registro[]" id="taller_12" value="taller_12"><time>10:00</time> Ayuda y Ayudate</label>
                                         <label><input type="checkbox" name="registro[]" id="taller_13" value="taller_13"><time>12:00</time> Ser mejor Padre</label>
                                         <label><input type="checkbox" name="registro[]" id="taller_14" value="taller_14"><time>14:00</time> Ser mejor Hijo</label>
                                         <label><input type="checkbox" name="registro[]" id="taller_15" value="taller_15"><time>17:00</time> Un futuro mejor</label>
                                         <label><input type="checkbox" name="registro[]" id="taller_16" value="taller_16"><time>19:00</time> ¿Quien soy?</label>
                                   </div>
                                   <div>
                                         <p>Conferencias:</p>
                                         <label><input type="checkbox" name="registro[]" id="conf_07" value="conf_07"><time>10:00</time>  Problema Y Solucion</label>
                                         <label><input type="checkbox" name="registro[]" id="conf_08" value="conf_08"><time>17:00</time> ¿Soy mala persona?</label>
                                         <label><input type="checkbox" name="registro[]" id="conf_09" value="conf_09"><time>19:00</time> Controla Tus Impulsos</label>
                                   </div>
                                   <div>
                                         <p>Seminarios:</p>
                                         <label><input type="checkbox" name="registro[]" id="sem_04" value="sem_04"><time>14:00</time> Psicologos Catolicos</label>
                                         <label><input type="checkbox" name="registro[]" id="sem_05" value="sem_05"><time>17:00</time> SAJUBA</label>
                                   </div>
                               </div> <!--#domingo-->
                           </div><!--.caja-->
                     </div> <!--#eventos-->
                     <div  id="resumen" class="resumen">
                       <h3>Pago Y Extras</h3>
                       <div class="caja clearfix">
                         <div class="extras">
                            <div class="orden">
                              <label for="camisa_evento">Camisa del Evento $10<small>(Promocion 7% dto.)</small></label>
                              <input type="number" min="0" id="camisa_evento" name="pedido_extra[camisas][cantidad]" size="3" placeholder="0">
                               <input type="hidden" value="10" name="pedido_extra[camisas][precio]">
                            </div> <!--.orden-->
                            <div class="orden">
                              <label for="etiquetas">Paquete de 3 etiquetas $2<small>(PSIVA/SAJUBA/Psicologos Catolicos)</small></label>
                              <input type="number" min="0" id="etiquetas" name="pedido_extra[etiquetas][cantidad]" size="3" placeholder="0">
                               <input type="hidden" value="2" name="pedido_extra[etiquetas][precio]">
                            </div> <!--.orden-->
                            <div class="orden">
                              <label for="regalo">Seleccione un regalo</label><br>
                              <select  id="regalo" name="regalo" required>
                                <option value="">-Selecione un regalo-</option>
                                <option value="2">Etiquetas</option>
                                <option value="1">Pulseras</option>
                                <option value="3">Plumas</option>
                              </select>
                            </div><!--.orden-->
                            <input type="button" id="calcular"  class="button" value="Calcular">
                         </div><!--.extras-->
                         <div class="total">
                           <p>RESUMEN:</p>
                           <div id="lista-productos">

                           </div>
                           <p>TOTAL:</p>
                           <div id="suma-total">

                           </div>
                           <input type="hidden" name="total_pedido" id="total_pedido" >
                           <input id="btnRegistro"  type="submit" name="submit" class="button" value="Pagar">
                         </div><!--.total-->
                       </div><!--.caja-->
                     </div><!--#resumen-->
     </div><!--#paquetes-->
   </form>
 </section>


<?php include_once 'includes/templates/footer.php'; ?>
