<?php
include '../funciones/sesiones.php';
include '../funciones/funciones.php';
include '../templates/header.php';
include '../templates/barra.php';
include '../templates/navegacion.php';
?>
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Modal -->
  <div class="modal fade" id="modal_editar" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Editar Evento</h4>
                  <button type="button" class="close" data-dismiss="modal">
                      <span aria-hidden="true">×</span>
                      <span class="sr-only">Close</span>
                  </button>  
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
              <p class="statusMsg"></p>
              <form method="post" action="modelo_cat.php" name="editar_cat" id="editar_cat">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nombre_evento">Nombre de la Categoria</label>
                    <input type="text" class="form-control" id="cat_evento" name="cat_evento" placeholder="Nombre">
                  </div>

                  <div class="form-group">
                      <label>Icono</label>
                      <div class="input-group">
                          <div class="input-group-prepend">
                              <spam class="input-group-text">
                                  <i class="fas fa-address-book"></i>
                              </spam>
                          </div>
                          <input type="text" id="icono" name="icono" class="form-control pull-right">
                      </div>
                  </div>

                    <input type="hidden" id="cat_id" name="cat_id">
                    <input type="hidden" name="edit_cat" value="1">
          
                  <!-- Modal Footer -->
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-primary" >Guardar</button>
                  </div>
                  
                </form>
              </div>
          </div>
        </div>
    </div>
  </div>
<!-- Modal -->

<!-- Table -->
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h2>LISTADO DE CATEGORIA DE EVENTOS</h2>
              </div>
              <!-- /.card-header -->
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">Maneja las categorias en esta sección</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="lista_admin" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Categoria</th>
                    <th>Icono</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      try {
                          $sql = "SELECT * FROM categoria_evento";
                          $resultado = $conn->query($sql);
                      } catch (Exception $e) {
                        $error = $e->getMessage();
                        echo $error;
                      }

                      while ($categorias = $resultado->fetch_assoc()) {
                       echo '<tr>
                       <td>'. $categorias['cat_evento'] . '</td>
                       <td><i class="fas '.$categorias['icono'].'"</i></td>
                      
                       <td> 
                            <a style="color:white!important;" data-toggle="modal" data-id="'.$categorias['id_categoria'].'" code-icon="'.$categorias['icono'].'" data-target="#modal_editar" class="btn btn-app bg-orange editarbtn_cat">
                              <i class="fas fa-edit"></i> Editar
                            </a>

                            <a href="#" data-id="'.$categorias['id_categoria'].'" class="btn btn-app bg-red borrar_cat">
                              <i class="fas fa-trash"></i> Borrar
                            </a>
                        </td>';
                      }
                    ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Categoria</th>
                    <th>Icono</th>
                    <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
<!-- Table -->

  </div>
  <!-- /.content-wrapper -->
 
<?php include '../templates/footer.php'; ?>
 