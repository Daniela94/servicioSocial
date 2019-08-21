<?php
  # Enlaces template Alumno
  # -----------------------------------------
  class EnlacesAlumnoModel {
    public function enlacesVistasAlumnoModel($enlacesModel) {
      // Vamos a pedirle que valide
      if ($enlacesModel == "misTareas" ||
          $enlacesModel == "formSubirTarea") {
          
          $module = MODULES_PATH."alumno/".$enlacesModel.".php";
      }
      else if ($enlacesModel == "envioExitoso") {
        $module = MODULES_PATH."alumno/formSubirTarea.php";
      }
      else if ($enlacesModel == "cerrarSesion") {
        $module = MODULES_PATH.$enlacesModel.".php";
      }
      return $module;
    }
  }
?>