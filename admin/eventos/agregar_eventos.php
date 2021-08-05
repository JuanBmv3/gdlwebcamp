<?php
include '../funciones/sesiones.php';
include '../funciones/funciones.php';
include '../templates/header.php';
include '../templates/barra.php';
include '../templates/navegacion.php';
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sección para registrar un nuevo evento</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 
    <!-- Main content -->
    <section class="content">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Crear evento</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="modelo_eventos.php" name="crear_eventos" id="crear_eventos">
            <div class="card-body">
              <div class="form-group">
                <label for="nombre_evento">Nombre del Evento</label>
                <input type="text" class="form-control" id="nombre_evento" name="nombre_evento" placeholder="Nombre">
              </div>

            <!-- /.form-group -->
            <div class="form-group">
                  <label>Categoria</label>
                  <select class="form-control select2" name="categoria_evento" style="width: 100%;">
                    <option selected="selected" disabled="disabled">-- Selecciona una categoria --</option>
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
                    <input type="text" placeholder="dd-mm-yyyy" name="fecha_evento" id="fecha_evento" class="form-control datetimepicker-input" data-target="#fecha"/> 
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
                      <input type="text" name="hora_evento" class="form-control datetimepicker-input" data-target="#time"/>
                    </div>
                    <!-- /.input group -->
                </div>
                <!-- /.form group -->
            </div>   
            <!-- Time -->

            <!-- /.form-group -->
            <div class="form-group">
                <label>Ponente</label>
                <select class="form-control select2" name="ponente_evento" style="width: 100%;">
                <option selected="selected" disabled="disabled">-- Selecciona un ponente --</option>
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
             <!-- /.form-group --> 
            <div>
                    <input type="hidden" name="agregar_evento" value="1">
                    <button type="submit" class="btn btn-primary" >Añadir</button>
              </div>
         </form>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
<?php include '../templates/footer.php'; ?>
 