<?php

  session_start();
  $cerrar_sesion = (isset($_GET['cerrar_sesion']));
  if($cerrar_sesion){
    session_destroy();
  }

include 'templates/header.php';

?>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>GDL</b>WebCamp</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Incia sesion para ingresar</p>

      <form method="post" action="control_login.php" name="form_login" id="form_login">
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <input type="hidden" name="login_admin" value="1">
            <button type="submit" class="btn btn-primary btn-lg btn-block ">Iniciar Sesión</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="/proyecto-curso/admin/plugins/jquery/jquery.min.js"></script>

<script src="/proyecto-curso/admin/js/sweetalert2.min.js"></script>

<script src="/proyecto-curso/admin/js/admin_ajax.js"></script>

