<?php
  include_once '../../../../core/config.path.php';
  include_once (MODULES_PATH.'head.php');
  require_once CONTROLLER_PATH.'Controller.php';
  require_once CONTROLLER_PATH.'AdminController.php';
  require_once MODEL_PATH.'EnlacesAdminModel.php';
  require_once MODEL_PATH.'Conexion.php';
  require_once MODEL_PATH.'Crud.php';
  require_once MODEL_PATH.'CrudAdminModel.php';
  require_once MODEL_PATH.'CrudProfesorModel.php';
  session_start();
  if (!$_SESSION['validar']) {
    header("location:".DIR_ROOT."index.php");
  }
?>
<div class="img-bg"></div>
<header class="Header navbar-blue-light">
  <a class="a-logo" href="templateAdmin.php"><li class="logo"></li></a>
  <nav class="Nav">
    <ul>
      <li><a href="templateAdmin.php?action=listaProfesores">Profesores</a></li>
      <li><a href="templateAdmin.php?action=listaAlumnos">Alumnos</a></li>
      <li><a href="templateAdmin.php?action=listaTareas">Tareas</a></li>
      <li><a href="templateAdmin.php?action=listaAdmin">Administradores</a></li>
      <li><a href="templateAdmin.php?action=formRegistrarUsuario">Agregar usuario</a></li>
    </ul>
  </nav>
  <span class="user-txt">Administrador(a) <?php echo $_SESSION['usuario'];?></span>
  <a href="templateAdmin.php?action=cerrarSesion">
    <i class="fas fa-sign-out-alt"></i>
  </a>
</header>

<section class="container">
  <?php
    $mvc = new AdminController();
    $mvc -> enlacesVistasAdminController();
  ?>
</section>
  
<?php
  include_once (MODULES_PATH.'footer.php');
?>