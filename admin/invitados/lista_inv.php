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
              <h4 class="modal-title">Editar Invitado</h4>
                  <button type="button" class="close" data-dismiss="modal">
                      <span aria-hidden="true">×</span>
                      <span class="sr-only">Close</span>
                  </button>  
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
              <p class="statusMsg"></p>
              <form method="post" action="modelo_inv.php" name="editar_inv" id="editar_inv" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nombre_evento">Nombre</label>
                    <input type="text" class="form-control" id="nombre_inv" name="nombre_inv" placeholder="Nombre">
                  </div>

                  <div class="form-group">
                    <label for="nombre_evento">Apellido</label>
                    <input type="text" class="form-control" id="apellido_inv" name="apellido_inv" placeholder="Apellido">
                  </div>

                  <div class="form-group">
                    <label for="nombre_evento">Biografía</label>
                    <textarea class="form-control" name="biografia_inv" id="biografia_inv" rows="10" placeholder="Biografia"></textarea>
                  </div>
                  
                  <div class="form-group">
                    <label for="nombre_evento">Imagen actual</label>
                    <br>
                    <img style="height:200px;" id="imagen_actual">
                  </div>

                    <div class="form-group">
                      <label for="exampleInputFile">Imagen</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="imagen_inv" name="imagen_inv" >
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                      </div>
                    </div>

                    <input type="hidden" id="inv_id" name="inv_id">
                    <input type="hidden" name="edit_inv" value="1">
          
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
                <h2>LISTADO DE INVITADOS</h2>
                
              </div>
              <!-- /.card-header -->
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">Maneja los invitados en esta sección</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="lista_admin" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Biografía</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      try {
                          $sql = "SELECT * FROM invitados";
                          $resultado = $conn->query($sql);
                      } catch (Exception $e) {
                        $error = $e->getMessage();
                        echo $error;
                      }

                      while ($invitados = $resultado->fetch_assoc()) {
                       echo '<tr>
                       <td>'. $invitados['nombre_invitado'] . '</td>
                       <td>'.$invitados['apellido_invitado'].'</td>
                       <td>'.$invitados['descripcion'].'</td>
                      
                       <td>
                        <div class="image">
                          <img style="height:100px;" src="../img/invitados/'.$invitados['url_imagen'].'" class="img-circle" alt="User Image"></td>
                        </div>
                       <td> 
                            <a style="color:white!important;" data-toggle="modal" data-id="'.$invitados['invitado_id'].'" url-image="'.$invitados['url_imagen'].'" data-target="#modal_editar" class="btn btn-app bg-orange editarbtn_inv">
                              <i class="fas fa-edit"></i> Editar
                            </a>

                            <a href="#" data-id="'.$invitados['invitado_id'].'" class="btn btn-app bg-red borrar_inv">
                              <i class="fas fa-trash"></i> Borrar
                            </a>
                        </td>';
                      }
                    ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Biografía</th>
                    <th>Imagen</th>
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
 