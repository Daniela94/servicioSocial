<?php
  include_once '../../../../core/config.path.php';
  include_once (MODULES_PATH.'head.php');
  require_once CONTROLLER_PATH.'controller.php';
  require_once MODEL_PATH.'enlacesAdmin.php';
  require_once MODEL_PATH.'conexion.php';
  require_once MODEL_PATH.'crud.php';
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
  <span class="user-txt">Admin </span>
  <a href="<?php echo DIR_ROOT.'index.php';?>">
    <i class="fas fa-sign-out-alt"></i>
  </a>
</header>

<section class="container">
  <?php
    $mvc = new Controller();
    $mvc -> enlacesVistasAdminController();
  ?>
</section>
  
<?php
  include_once (MODULES_PATH.'footer.php');
?>