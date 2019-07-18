<?php
  # Enlaces template Profesor
  # -----------------------------------------
  class EnlacesProfesorModel {
    public function enlacesVistasProfesorModel($enlacesModel) {
      // Vamos a pedirle que valide
      if ($enlacesModel == "misTareas" ||
					$enlacesModel == "formRegistrarTarea" ||
					$enlacesModel == "tareasAlumnos") {
          
          $module = MODULES_PATH."profesor/".$enlacesModel.".php";
      }
      else if ($enlacesModel == "ok") {
        $module = MODULES_PATH."profesor/formRegistrarTarea.php";
      }
      else if ($enlacesModel == "cerrarSesion") {
        $module = MODULES_PATH.$enlacesModel.".php";
      }
      return $module;
    }
  }
?>