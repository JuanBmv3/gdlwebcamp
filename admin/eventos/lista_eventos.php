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
              <form method="post" action="modelo_eventos.php" name="editar_evento" id="editar_evento">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nombre_evento">Nombre del Evento</label>
                    <input type="text" class="form-control" id="nombre_evento" name="nombre_evento">
                  </div>

                <!-- /.form-group -->
                  <div class="form-group">
                    <label>Categoria</label>
                    <select class="form-control select2" name="categoria_evento" id="categoria_evento" style="width: 100%;">
                    <option id="categoria_actual" selected="selected"></option>
                      <?php
                        try {
                            $sql = "SELECT id_categoria ,cat_evento FROM categoria_evento";
                            $resultado = $conn->query($sql);
                        } catch (Exception $e) {
                            $error = $e->getMessage();
                            echo $error;
                        }

                        while ($categoria = $resultado->fetch_assoc()) {
                            echo '<option value="'.$categoria['id_categoria'].'">'.$categoria['cat_evento'].'</option>';
                        }
                      ?>
                    </select>
                  </div>
                <!-- /.form-group --> 

               <!-- Date -->
                <div class="form-group">
                <label>Fecha Evento</label>
                <div class="input-group date" id="fecha" data-target-input="nearest">
                   <div class="input-group-append" data-target="#fecha" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                    <input type="text" name="fecha_evento" id="fecha_evento" class="form-control datetimepicker-input" data-target="#fecha"/> 
                </div>
              </div>
             <!-- Date -->
              
              <!-- Time -->
              <div class="bootstrap-timepicker">
                  <div class="form-group">
                      <label>Hora Evento</label>

                      <div class="input-group date" id="time" data-target-input="nearest">
                      <div class="input-group-append" data-target="#time" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                        </div>
                        <input type="text" id="hora_evento" name="hora_evento" class="form-control datetimepicker-input" data-target="#time"/>
                      </div>
                      <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
              </div>   
              <!-- Time -->

              <!-- /.form-group -->
              <div class="form-group">
                  <label>Ponente</label>
                  <select class="form-control select2" name="ponente_evento" id="ponente_evento" style="width: 100%;">
                  <option id="ponente_actual" selected="selected"></option>
                  <?php
                   
                      try {
                          $sql = "SELECT invitado_id, CONCAT(nombre_invitado,' ',apellido_invitado) as nombre FROM invitados";
                          $resultado = $conn->query($sql);
                      } catch (Exception $e) {
                          $error = $e->getMessage();
                          echo $error;
                      }

                      while ($invitados = $resultado->fetch_assoc()) {
                          echo '<option value="'.$invitados['invitado_id'].'">'.$invitados['nombre'].'</option>';
                      }
                  ?>
                  </select>
              </div>
                    <input type="hidden" id="evento_id" name="evento_id">
                    <input type="hidden" name="editar_evento" value="1">
          
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

  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h2>Listado de eventos</h2>
              </div>
              <!-- /.card-header -->
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">Maneja los eventos en esta sección</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="lista_admin" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Evento</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Categoria</th>
                    <th>Ponente</th>
                    <th>Acciones</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      try {
                          $sql = "SELECT E.evento_id, E.nombre_evento, E.fecha_evento, E.hora_evento, E.clave, CE.cat_evento, CE.id_categoria, I.invitado_id, CONCAT(I.nombre_invitado,' ',I.apellido_invitado) as nombre
                           FROM eventos E JOIN categoria_evento CE ON E.id_cat_evento = CE.id_categoria JOIN invitados I ON E.id_inv = I.invitado_id ";
                          $resultado = $conn->query($sql);
                      } catch (Exception $e) {
                        $error = $e->getMessage();
                        echo $error;
                      }

                      while ($eventos = $resultado->fetch_assoc()) {
                       echo '<tr>
                       <td>'. $eventos['nombre_evento'] . '</td>
                       <td>'. $eventos['fecha_evento']. '</td>
                       <td>'. $eventos['hora_evento']. '</td>
                       <td >'. $eventos['cat_evento']. '</td>
                       <td>'. $eventos['nombre']. '</td>
                       <td> 
                            <a style="color:white!important;" data-toggle="modal" data-id="'.$eventos['evento_id'].'" id-cat='.$eventos['id_categoria'].' id-inv='.$eventos['invitado_id'].' data-target="#modal_editar" class="btn btn-app bg-orange editarbtn_evento">
                              <i class="fas fa-edit"></i> Editar
                            </a>

                            <a href="#" data-id="'.$eventos['evento_id'].'" data-tipo="admin" class="btn btn-app bg-red borrar_evento">
                              <i class="fas fa-trash">  </i> Borrar
                            </a>
                        </td>';
                       

                      }
                      

                    ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Evento</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Categoria</th>
                    <th>Ponente</th>

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
 