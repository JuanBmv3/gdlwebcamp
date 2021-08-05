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
            <h1>Sección para registrar un nuevo administrador</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 
    <!-- Main content -->
    <section class="content">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Crear Administrador</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="insert_admin.php" name="crear_admin" id="crear_admin">
            <div class="card-body">
              <div class="form-group">
                <label for="usuario">Usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario">
              </div>
              <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
              </div>
              <div class="form-group">
                <label for="password">Repetir Password</label>
                <input type="password" class="form-control" id="repetir_password" name="repetir_password" placeholder="Repetir Password">
                <span id="resultado_password" class="help-block"></span>
              </div>
            <div>
                    <input type="hidden" name="agregar_admin" value="1">
                    <button type="submit" class="btn btn-primary" id="agregarbtn">Añadir</button>
              </div>
         </form>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
<?php include '../templates/footer.php'; ?>
 