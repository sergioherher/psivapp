<?php

      $id = $_GET['id'];
      if(!filter_var($id, FILTER_VALIDATE_INT)) {
          die("Error");
      }

      include_once 'funciones/sesiones.php';
      include_once 'templates/header.php';
      include_once 'funciones/funciones.php';
      include_once 'templates/barra.php';
      include_once 'templates/navegacion.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cargar documento
        <small>Llena el formulario para cargar un documento</small>
      </h1>
    </section>

        <div class="row">
                <div class="col-md-8">
                <!-- Main content -->
                <section class="content">

                  <!-- Default box -->
                  <div class="box">
                    <div class="box-header with-border">
                      <h3 class="box-title">Cargar documento</h3>
                    </div>
                    <div class="box-body">
                        <?php
                            $sql = "SELECT * FROM documentos WHERE id = $id ";
                            $resultado = $conn->query($sql);
                            $documento = $resultado->fetch_assoc();
                        ?>
                        <!-- form start -->
                        <form role="form" name="guardar-documento" id="guardar-documento" method="post" action="modelo-documento.php" enctype="multipart/form-data">
                              <div class="box-body">
                                    <div class="form-group">
                                          <label for="descripcion_documento">Descripción del archivo:</label>
                                          <input type="text" class="form-control" id="descripcion_documento" name="descripcion_documento" placeholder="Descripción del archivo" value="<?php echo $documento['nombre']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="imagen_actual">Documento Actual</label>
                                        <br>
                                        <a href="<?php echo $documento['url']; ?>" width="200"><?php echo $documento['url']; ?></a>
                                    </div>
                                    <div class="form-group">
                                          <label for="d">Archivo:</label>
                                          <input type="file" class="form-control" id="archivo_documento" name="archivo_documento">
                                    </div>
                              </div>
                              <!-- /.box-body -->

                              <div class="box-footer">
                                  <input type="hidden" name="registro" value="actualizar">
                                  <input type="hidden" name="id_admin" value="<?=$_SESSION['id_admin']?>">
                                  <input type="hidden" name="id_registro" value="<?php echo $documento['id']; ?>">
                                  <button type="submit" class="btn btn-primary" id="crear_documento">Editar</button>
                              </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->

                </section>
                <!-- /.content -->
                
                </div>
        </div>
  </div>
  <!-- /.content-wrapper -->

  <?php
          include_once 'templates/footer.php';
  ?>

