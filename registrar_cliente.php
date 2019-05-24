<?php include_once 'includes/templates/header.php'; ?>

 <section class="seccion contenedor">
   <h2><a name="link_registro" id="link_registro">Registrarse</a></h2>
   <form id="ingresar" class="ingresar" action="validar_login.php" method="post">
    <center>
       <div id="datos_usuario"class="ingreso caja clearfix" style="width: 50%">
         <div class="campo_ingreso row">
            <div class="col-4">
              <label for="nombre">Usuario:</label>
            </div>
            <div class="col-8">
              <input autofocus size="40" type="text" id="nombre" name="nombre" placeholder="Nickname">
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
              <label for="nombre">Email:</label>
            </div>
            <div class="col-8">
              <input autofocus size="40" type="text" id="email_cliente" name="email_cliente" placeholder="ejemplo@correo.com">
            </div>
         </div>
         <div class="campo_ingreso row">
          <div class="col-9">
          </div>
          <div class="col-3">
           <button type="submit" class="btn btn-primary">Registrarse</button>
          </div>
         </div>

         <div id="error"></div>
       </div><!--#datos_usuario-->
     </center>
   </form>
   <div class="row">
    <div class="col-4"></div>
    <div class="col-8">¿Ya tiene una cuenta?  <a href="login.php">Ingrese</a></div>
   </div>
   <div class="row">
    <div class="col-4"></div>
    <div class="col-8">¿Olvidó su contraseña?  <a href="recuperar_cliente.php">Recupérela</a></div>
   </div>
 </section>

<?php include_once 'includes/templates/footer.php'; ?>
