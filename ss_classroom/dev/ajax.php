<?php
  // require_once './core/config.path.php';
  // require_once CONTROLLER_PATH.'AdminController.php';
  // require_once MODEL_PATH.'CrudAdminModel.php';
  require_once "controllers/AdminController.php";
  require_once "models/CrudAdminModel.php";

  class Ajax {

    public $validarNombre;

    public function validarNombreAjax() {
      $datos = $this->validarNombre;
      $respuesta = CrudAdminModel::validarNombreRegistroController($datos);
      echo $datos;
    }
  }
  $validar = new Ajax();
  $validar -> validarNombre = $_POST["validarNombre"];
  $validar -> validarNombreAjax();
?>