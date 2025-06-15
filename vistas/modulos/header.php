<header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Home</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>INVENTARIOS</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
         
          <li class="dropdown user user-menu">

            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="vistas/dist/img/cuenta.png" class="user-image" alt="User Image">

              <span class="hidden-xs"> <?php echo $_SESSION['usuario'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="vistas/dist/img/cuenta.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['usuario'];?>
                  <small>Bienvenido</small>
                </p>
              </li>
             
              <!-- Menu Footer-->
              <li class="user-footer">
               
                <div class="pull-right">
                  <a href="salir" class="btn btn-default btn-flat">Cerrar Sesion</a>
                </div>
              </li>
            </ul>
          </li>
      </div>
    </nav>
  </header>