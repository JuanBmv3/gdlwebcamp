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
            <h4 class="modal-title">Editar Administradores</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
               
            </div>
            
            <!-- Modal Body -->
                <div class="modal-body">
                    <p class="statusMsg"></p>
                    <form action="editar_admin.php" name="edit_admin" id="edit_admin" method="POST">
                        <div class="form-group">
                            <label for="inputName">Usuario</label>
                            <input type="text" class="form-control" id="usuario" name="usuario"/>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre"/>
                        </div>
                        <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                        <input type="hidden" id="ID_admin" name="ID_admin">
                        <input type="hidden" name="editar_admin" value="1">
                    
               
              
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
<!-- Modal -->

  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Listado de Administradores</h3>
              </div>
              <!-- /.card-header -->
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">Maneja los administradores en esta sección</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="lista_admin" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      try {
                          $sql = "SELECT ID_admin, usuario, nombre FROM admin";
                          $resultado = $conn->query($sql);
                      } catch (Exception $e) {
                        $error = $e->getMessage();
                        echo $error;
                      }

                      while ($admin = $resultado->fetch_assoc()) {
                       echo '<tr>
                       <td>'. $admin['usuario'] . '</td>
                       <td>'. $admin['nombre']. '</td>
                       <td> 
                            <a style="color:white!important;" data-toggle="modal" data-id="'.$admin['ID_admin'].'" data-target="#modal_editar" class="btn btn-app bg-orange editarbtn">
                              <i class="fas fa-edit"></i> Editar
                            </a>

                            <a href="#" data-id="'.$admin['ID_admin'].'" data-tipo="admin" class="btn btn-app bg-red borrar_registro">
                              <i class="fas fa-trash">  </i> Borrar
                            </a>
                        </td>';

                      }

                    ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Usuario</th>
                    <th>Nombre</th>
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
  </div>
  <!-- /.content-wrapper -->
 
<?php include '../templates/footer.php'; ?>
 