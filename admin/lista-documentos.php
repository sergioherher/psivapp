<?php
        include_once 'funciones/sesiones.php';
        include_once 'funciones/funciones.php';
        include_once 'templates/header.php';
        include_once 'templates/barra.php';
        include_once 'templates/navegacion.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
          <h1>
            Listado de Documentos
            <small></small>
          </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Administra el listado de sus documentos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Archivo</th>
                  <?php if($_SESSION['nivel'] == 1) { ?>
                    <th>Usuario</th>
                  <?php } ?>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                        <?php
                            try {
                                if($_SESSION['nivel'] == 0) {
                                  $sql = "SELECT documentos.id AS id, documentos.id_admin AS id_admin, documentos.nombre AS archivo, documentos.url AS url FROM documentos WHERE id_admin =".$_SESSION['id_admin'];
                                }
                                else {
                                  $sql = "SELECT documentos.id AS id, documentos.id_admin AS id_admin, documentos.nombre AS archivo, documentos.url AS url, admins.nombre AS usuario FROM documentos INNER JOIN admins ON documentos.id_admin = admins.id_admin";
                                }
                                $resultado = $conn->query($sql);
                            } catch (Exception $e) {
                                $error = $e->getMessage();
                                echo $error;
                            }
                            while($documento = $resultado->fetch_assoc() ) { ?>
                                
                                <tr>
                                    <td><a href="<?php echo "documentos/".$documento['url']; ?>"><?php echo $documento['archivo'];  ?></a></td>
                                    <?php if($_SESSION['nivel'] == 1) { ?>
                                    <td><?php echo $documento['usuario'];  ?></td>
                                    <?php } ?>
                                    <td>
                                        <a href="editar-documento.php?id=<?php echo $documento['id'] ?>" class="btn bg-orange btn-flat margin">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="#" data-id="<?php echo $documento['id'] ?>" data-tipo="documento" class="btn bg-maroon bnt-flat margin borrar_registro">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        
                                    </td>
                                </tr>
                            <?php  }  ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Archivo</th>
                  <th>Acciones</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php
          include_once 'templates/footer.php';
  ?>

