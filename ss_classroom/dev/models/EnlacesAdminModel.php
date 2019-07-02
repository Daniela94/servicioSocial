<?php
  # ENLACES TEMPLATE ADMIN
  # -----------------------------------------
  class EnlacesAdminModel {
    public function enlacesVistasAdminModel($enlacesModel) {
      // Vamos a pedirle que valide
      if ($enlacesModel == "listaProfesores" ||
          $enlacesModel == "listaAlumnos" ||
          $enlacesModel == "listaTareas" ||
          $enlacesModel == "listaAdmin" ||
          $enlacesModel == "formRegistrarUsuario") {
          
          $module = MODULES_PATH."admin/".$enlacesModel.".php";

      }
      else if ($enlacesModel == "ok") {
        $module = MODULES_PATH."admin/formRegistrarUsuario.php";
      }
      else if ($enlacesModel == "cerrarSesion") {
        $module = MODULES_PATH.$enlacesModel.".php";
      }
      return $module;
    }
  }
?>