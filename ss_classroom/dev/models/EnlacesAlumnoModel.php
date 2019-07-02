<?php
  # Enlaces template Alumno
  # -----------------------------------------
  class EnlacesAlumnoModel {
    public function enlacesVistasAlumnoModel($enlacesModel) {
      // Vamos a pedirle que valide
      if ($enlacesModel == "misTareas") {
          
          $module = MODULES_PATH."alumno/".$enlacesModel.".php";
      }
      else if ($enlacesModel == "cerrarSesion") {
        $module = MODULES_PATH.$enlacesModel.".php";
      }
      return $module;
    }
  }
?>