<?php
  include_once '../../../../core/config.path.php';
  include_once (MODULES_PATH.'head.php');
  require_once CONTROLLER_PATH.'AdminController.php';
  require_once CONTROLLER_PATH.'ProfesorController.php';
  require_once MODEL_PATH.'EnlacesAdminModel.php';
  require_once MODEL_PATH.'EnlacesProfesorModel.php';
  require_once MODEL_PATH.'Conexion.php';
  require_once MODEL_PATH.'Crud.php';
?>
<div class="img-bg"></div>
<header class="Header navbar-blue-light">
  <a class="a-logo" href="templateProfesor.php"><li class="logo"></li></a>
  <nav class="Nav">
    <ul>
      <li><a href="templateProfesor.php?action=misTareas">Mis tareas</a></li>
			<li><a href="templateProfesor.php?action=formRegistrarTarea">Agregar tarea</a></li>
    </ul>
  </nav>
  <span class="user-txt">Profesor(a) </span>
  <a href="<?php echo DIR_ROOT.'index.php';?>">
    <i class="fas fa-sign-out-alt"></i>
  </a>
</header>

<section class="container">
  <?php
    $mvc = new ProfesorController();
    $mvc -> enlacesVistasProfesorController();
  ?>
</section>
  
<?php
  include_once (MODULES_PATH.'footer.php');
?>