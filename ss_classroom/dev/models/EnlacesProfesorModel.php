<?php
  # ENLACES TEMPLATE ADMIN
  # -----------------------------------------
  class EnlacesProfesorModel {
    public function enlacesVistasProfesorModel($enlacesModel) {
      // Vamos a pedirle que valide
      if ($enlacesModel == "misTareas" ||
					$enlacesModel == "formRegistrarTarea" ||
					$enlacesModel == "tareasAlumnos") {
          
          $module = MODULES_PATH."profesor/".$enlacesModel.".php";
        }
      return $module;
    }
  }
?>