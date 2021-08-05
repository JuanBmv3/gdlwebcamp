<?php
include 'funciones/sesiones.php';
include '../includes/funciones/bd_conexion.php';
include 'templates/header.php';
include 'templates/barra.php';
include 'templates/navegacion.php';
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <div class="col-sm-6 mb-2">
            <h1>Dashboard <small style="color: gray">Información sobre el evento</small></h1> 
        </div>
        <div class="row">
          <div class="col-lg-3 col-6">
            <?php
                try {
                    $sql = "SELECT COUNT(ID_Registrado) as total FROM registrados ";
                    $resultado = $conn->query($sql);
                    $registrados = $resultado->fetch_assoc();
                } catch (Exception $e) {
                $error = $e->getMessage();
                echo $error;
                }
            ?>
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $registrados['total'] ?></h3>

                <p>Personas registradas</p>
              </div>
              <div class="icon">
                    <i class="fas fa-user-check"></i>
              </div>
              <a href="registrados/lista_registrados.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
          <?php
                try {
                    $sql = "SELECT COUNT(pagado) as total FROM registrados where pagado=1 ";
                    $resultado = $conn->query($sql);
                    $registrados = $resultado->fetch_assoc();
                } catch (Exception $e) {
                $error = $e->getMessage();
                echo $error;
                }
            ?>
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $registrados['total'] ?> </h3>

                <p>Total registros pagados</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="registrados/lista_registrados.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
         <!-- ./col -->

         <div class="col-lg-3 col-6">
          <?php
                try {
                    $sql = "SELECT COUNT(pagado) as total FROM registrados where pagado=0 ";
                    $resultado = $conn->query($sql);
                    $registrados = $resultado->fetch_assoc();
                } catch (Exception $e) {
                $error = $e->getMessage();
                echo $error;
                }
            ?>
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $registrados['total'] ?> </h3>

                <p>Total registros no pagados</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-minus"></i>
              </div>
              <a href="registrados/lista_registrados.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
            <!-- ./col -->

          <div class="col-lg-3 col-6">
          <?php
                try {
                    $sql = "SELECT SUM(total_pagado) as total FROM registrados where pagado=1 ";
                    $resultado = $conn->query($sql);
                    $registrados = $resultado->fetch_assoc();
                } catch (Exception $e) {
                $error = $e->getMessage();
                echo $error;
                }
            ?>
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo '$'.$registrados['total'] ?> </h3>
                <p>Ganancia totales</p>
              </div>
              <div class="icon">
                    <i class="fas fa-dollar-sign"></i>
              </div>
              <a href="registrados/lista_registrados.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

        <div class="col-sm-6 mb-2">
          <h1>Información de regalos </h1> 
        </div>
        <div class="row">
          <div class="col-lg-3 col-6">
            <?php
                try {
                    $sql = "SELECT COUNT(R.regalo) as total FROM registrados R join regalos RE on R.regalo = RE.ID_regalo where RE.nombre_regalo = 'Pulsera'";
                    $resultado = $conn->query($sql);
                    $registrados = $resultado->fetch_assoc();
                } catch (Exception $e) {
                $error = $e->getMessage();
                echo $error;
                }
            ?>
            <!-- small box -->
            <div class="small-box bg-pink">
              <div class="inner">
                <h3><?php echo $registrados['total'] ?></h3>

                <p>Pulseras</p>
              </div>
              <div class="icon">
                <i class="fas fa-gifts"></i>
              </div>
              <a href="registrados/lista_registrados.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <?php
                try {
                    $sql = "SELECT COUNT(R.regalo) as total FROM registrados R join regalos RE on R.regalo = RE.ID_regalo where RE.nombre_regalo = 'Etiquetas'";
                    $resultado = $conn->query($sql);
                    $registrados = $resultado->fetch_assoc();
                } catch (Exception $e) {
                $error = $e->getMessage();
                echo $error;
                }
            ?>
            <!-- small box -->
            <div class="small-box bg-purple">
              <div class="inner">
                <h3><?php echo $registrados['total'] ?></h3>

                <p>Etiquetas</p>
              </div>
              <div class="icon">
              <i class="fas fa-gifts"></i>
              </div>
              <a href="registrados/lista_registrados.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <?php
                try {
                    $sql = "SELECT COUNT(R.regalo) as total FROM registrados R join regalos RE on R.regalo = RE.ID_regalo where RE.nombre_regalo = 'Plumas'";
                    $resultado = $conn->query($sql);
                    $registrados = $resultado->fetch_assoc();
                } catch (Exception $e) {
                $error = $e->getMessage();
                echo $error;
                }
            ?>
            <!-- small box -->
            <div class="small-box bg-blue">
              <div class="inner">
                <h3><?php echo $registrados['total'] ?></h3>

                <p>Plumas</p>
              </div>
              <div class="icon">
              <i class="fas fa-gifts"></i>
              </div>
              <a href="registrados/lista_registrados.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

        <div class="col-sm-6 mb-2">
        <h1>Gráfica </h1> 
        </div>
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Gráfica de registros por fecha</h3>
          </div>
          <div class="card-body">
            <div class="chart">
            <div id="grafica_registros" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
            </div>
          </div>
          <!-- /.card-body -->
        </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
<?php include 'templates/footer.php'; ?>
 