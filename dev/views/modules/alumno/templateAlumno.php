<?php
  include_once '../../../../core/config.path.php';
  include_once (MODULES_PATH.'head.php');
  require_once CONTROLLER_PATH.'Controller.php';
  require_once CONTROLLER_PATH.'AdminController.php';
  require_once CONTROLLER_PATH.'ProfesorController.php';
  require_once CONTROLLER_PATH.'AlumnoController.php';
  require_once MODEL_PATH.'EnlacesAdminModel.php';
  require_once MODEL_PATH.'EnlacesProfesorModel.php';
  require_once MODEL_PATH.'EnlacesAlumnoModel.php';
  require_once MODEL_PATH.'Conexion.php';
  require_once MODEL_PATH.'Crud.php';
  session_start();
  if (!$_SESSION['validar']) {
    header("location:".DIR_ROOT."index.php");
  }
?>
<div class="img-bg"></div>
<header class="Header navbar-blue-light">
  <a class="a-logo" href="templateAlumno.php"><li class="logo"></li></a>
  <nav class="Nav">
    <ul>
      <li><a href="templateAlumno.php?action=misTareas">Mis tareas</a></li>
    </ul>
  </nav>
  <span class="user-txt">Alumno(a) <?php echo $_SESSION['usuario'];?></span>
  <a href="templateAlumno.php?action=cerrarSesion">
    <i class="fas fa-sign-out-alt"></i>
  </a>
</header>

<section class="container">
  <?php
    $mvc = new AlumnoController();
    $mvc -> enlacesVistasAlumnoController();
  ?>
</section>
  
<?php
  include_once (MODULES_PATH.'footer.php');
?>