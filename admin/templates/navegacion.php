<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/proyecto-curso/admin/admin_area.php" class="brand-link">
      <img src="/proyecto-curso/admin/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">GDL WebCamp</span>
    </a>
 
    <!-- Sidebar   dashboard,  eventos -ver todos, agregar, categoria eventos, invitados, registrados, administradores, testimoniales -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/proyecto-curso/admin/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Juan Carlos</a>
        </div>
      </div>
 
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/proyecto-curso/admin/dashboard.php" class="nav-link">
              <i class="fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="far fa-calendar-alt"></i>
              <p>
                Eventos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/proyecto-curso/admin/eventos/lista_eventos.php" class="nav-link">
                  <i class="fas fa-list"></i>
                  <p>Ver todos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/proyecto-curso/admin/eventos/agregar_eventos.php" class="nav-link">
                  <i class="fas fa-plus-circle"></i>
                  <p>Agregar</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-clipboard-list"></i>
              <p>
                Categoria Eventos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              
                <a href="/proyecto-curso/admin/cat_eventos/listar_cat_eventos.php" class="nav-link">
                  <i class="fas fa-list"></i>
                  <p>Ver todos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/proyecto-curso/admin/cat_eventos/agregar_cat_evento.php" class="nav-link">
                  <i class="fas fa-plus-circle"></i>
                  <p>Agregar</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-users"></i>
              <p>
                Invitados
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/proyecto-curso/admin/invitados/lista_inv.php" class="nav-link">
                  <i class="fas fa-list"></i>
                  <p>Ver todos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/proyecto-curso/admin/invitados/agregar_inv.php" class="nav-link">
                  <i class="fas fa-plus-circle"></i>
                  <p>Agregar</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-user-check"></i>
              <p>
                Registrados
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/proyecto-curso/admin/registrados/lista_registrados.php" class="nav-link">
                  <i class="fas fa-list"></i>
                  <p>Ver todos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/proyecto-curso/admin/registrados/agregar_registrados.php" class="nav-link">
                  <i class="fas fa-plus-circle"></i>
                  <p>Agregar</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-users-cog"></i>
              <p>
                Administradores
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/proyecto-curso/admin/administradores/lista_admin.php" class="nav-link">
                  <i class="fas fa-list"></i>
                  <p>Ver todos</p> 
                </a>
              </li>
              <li class="nav-item">
                <a href="/proyecto-curso/admin/administradores/agregar_admin.php" class="nav-link">
                  <i class="fas fa-plus-circle"></i>
                  <p>Agregar</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-comments"></i>
              <p>
                Testimoniales
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../layout/top-nav.html" class="nav-link">
                  <i class="fas fa-list"></i>
                  <p>Ver todos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/boxed.html" class="nav-link">
                  <i class="fas fa-plus-circle"></i>
                  <p>Agregar</p>
                </a>
              </li>
            </ul>
          </li>
         
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>