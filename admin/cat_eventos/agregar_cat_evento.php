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
            <h1>SECCION PARA REGISTRAR UNA NUEVA CATEGORIA</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 
    <!-- Main content -->
    <section class="content">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Crear categoria</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="modelo_cat.php" name="crear_cat" id="crear_cat">
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
                        <input type="text" id="icono" name="icono" class="form-control pull-right" placeholder="fa-icon">
                    </div>
                </div>
                
                <div>
                    <input type="hidden" name="agregar_cat" value="1">
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
 