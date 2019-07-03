<?php
  include_once 'core/config.path.php';
  require_once MODEL_PATH.'EnlacesAdminModel.php';
  require_once MODEL_PATH.'EnlacesProfesorModel.php';
  require_once MODEL_PATH.'Conexion.php';
  require_once MODEL_PATH.'Crud.php';
  require_once MODEL_PATH.'CrudAdminModel.php';
  require_once MODEL_PATH.'CrudProfesorModel.php';
  require_once CONTROLLER_PATH.'Controller.php';
  require_once CONTROLLER_PATH.'AdminController.php';
  require_once CONTROLLER_PATH.'ProfesorController.php';

  $mvc = new Controller();
  $mvc -> loginPage();

?>