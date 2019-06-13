<?php
  include_once 'core/config.path.php';
  require_once CONTROLLER_PATH.'controller.php';
  require_once MODEL_PATH.'model.php';

  $mvc = new Controller();
  $mvc -> loginPage();
  // echo $dir_views; 

?>