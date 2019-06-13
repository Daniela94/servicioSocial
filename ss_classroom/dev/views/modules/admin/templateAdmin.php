<?php
  include_once '../../../../core/config.path.php';
  include_once (MODULES_PATH.'head.php');
  require_once CONTROLLER_PATH.'controller.php';
  require_once MODEL_PATH.'model.php';
?>
<div class="img-bg"></div>
<header class="Header navbar-blue-light">
  <a class="a-logo" href="templateAdmin.php"><li class="logo"></li></a>
  <nav class="Nav">
    <ul>
      <li><a href="templateAdmin.php?action=listaProfesores">Lista de profesores</a></li>
      <li><a href="templateAdmin.php?action=listaAlumnos">Lista de alumnos</a></li>
      <li><a href="templateAdmin.php?action=listaTareas">Lista de tareas</a></li>
      <li><a href="templateAdmin.php?action=formRegistrarUsuario">Agregar usuario</a></li>
    </ul>
  </nav>
  <span class="user-txt">Admin</span>
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