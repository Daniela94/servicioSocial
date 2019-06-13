<?php
  class EnlacesVistasAdmin {
    public function enlacesVistasAdminModel($enlacesModel) {
      // Vamos a pedirle que valide
      if ($enlacesModel == "listaProfesores" ||
          $enlacesModel == "listaAlumnos" ||
          $enlacesModel == "listaTareas" ||
          $enlacesModel == "formRegistrarUsuario") {
          
          $module = MODULES_PATH."admin/".$enlacesModel.".php";
        }
      return $module;
    }
  }
?>