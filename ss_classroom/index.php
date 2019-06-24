<?php
  include_once 'core/config.path.php';
  require_once CONTROLLER_PATH.'controller.php';
  require_once MODEL_PATH.'enlacesAdmin.php';
  require_once MODEL_PATH.'conexion.php';
  require_once MODEL_PATH.'crud.php';

  $mvc = new Controller();
  $mvc -> loginPage();

?>