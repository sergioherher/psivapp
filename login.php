<?php 
session_start();
$cerrar_sesion = $_GET['cerrar_sesion'];
if($cerrar_sesion) {
  session_destroy();
}
if(isset($_SESSION['usuario_cliente'])) {
  header('location:registro.php');
}
include_once 'includes/templates/header.php'; ?>

 <section class="seccion contenedor">
   <h2><a name="link_registro" id="link_registro">Ingresar</a></h2>
   <form id="ingresar" class="ingresar" action="modelo-cliente.php" method="post">
    <center>
       <div id="datos_usuario"class="ingreso caja clearfix" style="width: 50%">
         <div class="campo_ingreso row">
            <div class="col-4">
              <label for="nombre">Usuario:</label>
            </div>
            <div class="col-8">
              <input autofocus size="40" type="text" id="usuario" name="usuario" placeholder="Nickname">
            </div>
         </div>
         <div class="campo_ingreso row">
          <div class="col-4">
           <label for="password">Contraseña:</label>
          </div>
          <div class="col-8">
           <input type="password" size="40" id="password" name="password">
          </div>
         </div>
         <div class="campo_ingreso row">
          <div class="col-9">
          </div>
          <div class="col-3">
           <input type="hidden" id="registro" name="registro" value="ingresar">
           <button type="submit" class="btn btn-primary">Ingresar</button>
          </div>
         </div>

         <div id="row error" style="color: red; <?php if(isset($_GET['existe'])) { echo "display:block; "; }?>">
           <div class="col-12">
            <?php if(isset($_GET['existe'])) { echo "Usuario o password inválido"; }?>
           </div>
          </div>
       </div><!--#datos_usuario-->
     </center>
   </form>
   <!--
   <div class="row">
    <div class="col-4"></div>
    <div class="col-8">¿Olvidó su contraseña?  <a href="recuperar_cliente.php">Recupérela</a></div>
   </div>
    -->
   <div class="row">
    <div class="col-4"></div>
    <div class="col-8">¿Su primera vez en esta página? Regístrese <a href="registrar_cliente.php">aquí</a></div>
   </div>
 </section>

<?php include_once 'includes/templates/footer.php'; ?>
