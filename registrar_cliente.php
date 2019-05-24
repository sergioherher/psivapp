<?php include_once 'includes/templates/header.php'; ?>

 <section class="seccion contenedor">
   <h2><a name="link_registro" id="link_registro">Registrarse</a></h2>
   <form id="crear_cliente" class="crear_cliente" action="modelo-cliente.php" method="post">
    <center>
       <div id="datos_usuario"class="ingreso caja clearfix" style="width: 50%">
         <div class="campo_ingreso row">
            <div class="col-4">
              <label for="usuario">Usuario:</label>
            </div>
            <div class="col-8">
              <input autofocus size="40" type="text" id="usuario" name="usuario" placeholder="Nickname">
            </div>
         </div>
         <div class="campo_ingreso row">
            <div class="col-4">
              <label for="nombre">Nombre:</label>
            </div>
            <div class="col-8">
              <input size="40" type="text" id="nombre" name="nombre" placeholder="Nombre">
            </div>
         </div>
         <div class="campo_ingreso row">
            <div class="col-4">
              <label for="apellido">Apellido:</label>
            </div>
            <div class="col-8">
              <input size="40" type="text" id="apellido" name="apellido" placeholder="Apellido">
            </div>
         </div>
         <div class="campo_ingreso row">
          <div class="col-4">
           <label for="password">Contraseña:</label>
          </div>
          <div class="col-8">
           <input type="password" size="40" id="password" name="password" placeholder="Password">
          </div>
         </div>
         <div class="campo_ingreso row">
            <div class="col-4">
              <label for="email_cliente">Email:</label>
            </div>
            <div class="col-8">
              <input size="40" type="text" id="email_cliente" name="email_cliente" placeholder="ejemplo@correo.com">
            </div>
         </div>
         <div class="campo_ingreso row">
          <div class="col-9">
          </div>
          <div class="col-3">
           <input type="hidden" name="registro" value="nuevo">
           <button type="submit" class="btn btn-primary">Registrarse</button>
          </div>
         </div>
         <div id="row error" style="color: red; <?php if(isset($_GET['existe']) || isset($_GET['vacio'])) { echo "display:block; "; }?>">
           <div class="col-12">
            <?php if(isset($_GET['existe'])) { echo "El usuario ya existe, por favor escriba uno diferente"; }?>
            <?php if(isset($_GET['vacio']) && isset($_GET['campo'])) { echo "El campo ".$_GET['campo']." no puede quedar vacío"; }?>
            <?php if(isset($_GET['invalido']) && isset($_GET['campo'])) { echo "El campo ".$_GET['campo']." no debe contener espacios ni caracteres especiales"; }?>
           </div>
          </div>
       </div><!--#datos_usuario-->
     </center>
   </form>
   <div class="row">
    <div class="col-4"></div>
    <div class="col-8">¿Ya tiene una cuenta?  <a href="login.php">Ingrese</a></div>
   </div>
   <!--
   <div class="row">
    <div class="col-4"></div>
    <div class="col-8">¿Olvidó su contraseña?  <a href="recuperar_cliente.php">Recupérela</a></div>
   </div>-->
 </section>

<?php include_once 'includes/templates/footer.php'; ?>
