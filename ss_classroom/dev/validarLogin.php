<?php 
  include_once '../core/config.path.php';
  require_once CONTROLLER_PATH.'controller.php';
  require_once MODEL_PATH.'conexion.php';
  require_once MODEL_PATH.'crud.php';
  $axn = new Controller();
  $axn -> validarLoginUsuario();
?>