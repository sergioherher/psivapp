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

<div class="seccion container">
  <div class="row">
    <div class="col s2"></div>
    <div class="col s8 card">
      <h2>Ingresar</h2>
      <div class="row">
        <form id="ingresar" class="col s12" action="modelo-cliente.php" method="post">
          <div class="row">
            <div class="col s2"></div>
            <div class="input-field col s8">
                <input id="usuario" name="usuario" type="text" class="validate">
                <label for="usuario">Usuario:</label>
            </div>
            <div class="col s2"></div>
          </div>
          <div class="row">
            <div class="col s2"></div>
            <div class="input-field col s8">
                <input id="password" name="password" type="password" class="validate">
                <label for="password">Contraseña:</label>
            </div>
            <div class="col s2"></div>
          </div>
          <div class="row">
            <div class="col s5"></div>
            <div class="col s2">
              <input type="hidden" id="registro" name="registro" value="ingresar">
              <button type="submit" class="btn green accent-4">Ingresar</button></div>
            <div class="col s5"></div>
          </div>
          <div id="row error" style="color: red; <?php if(isset($_GET['existe'])) { echo "display:block;"; }?>">
            <div class="col s12">
              <?php if(isset($_GET['existe'])) { echo "Usuario o password inválido"; }?>
            </div>
          </div>
          <div class="row center">
            <div class="col s3"></div>
            <div class="col s6">
              ¿Su primera vez en esta página? Regístrese <a href="registrar_cliente.php">aquí</a>
            </div>
            <div class="col s3"></div>
          </div>
        </form>
      </div>
    </div>
    <div class="col s2"></div>
  </div>
</div>

<?php include_once 'includes/templates/footer.php'; ?>
