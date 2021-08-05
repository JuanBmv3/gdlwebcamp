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
            <h1>SECCIÓN PARA REGISTRAR UNA NUEVO INVITADO</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 
    <!-- Main content -->
    <section class="content">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Agregar invitado</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="modelo_inv.php" name="crear_inv" id="crear_inv" enctype="multipart/form-data">
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
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="imagen_inv" name="imagen_inv" >
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
    
                <div>
                    <input type="hidden" name="agregar_inv" value="1">
                    <button type="submit" class="btn btn-primary" >Añadir</button>
                </div>
            </div>
        </form>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
<?php include '../templates/footer.php'; ?>
 