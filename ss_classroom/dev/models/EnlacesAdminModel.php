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
          $enlacesModel == "editarUsuario" ||
          $enlacesModel == "formRegistrarUsuario" ||
          $enlacesModel == "formEditarUsuario") {
          
          $module = MODULES_PATH."admin/".$enlacesModel.".php";
      }
      else if ($enlacesModel == "ok") {
        $module = MODULES_PATH."admin/formRegistrarUsuario.php";
      }
      else if ($enlacesModel == "actualizacionProfesor") {
        $module = MODULES_PATH."admin/listaProfesores.php";
      }
      else if ($enlacesModel == "actualizacionAlumno") {
        $module = MODULES_PATH."admin/listaAlumnos.php";
      }
      else if ($enlacesModel == "eliminacionProfesor") {
        $module = MODULES_PATH."admin/listaProfesores.php";
      }
      else if ($enlacesModel == "eliminacionAlumno") {
        $module = MODULES_PATH."admin/listaAlumnos.php";
      }
      else if ($enlacesModel == "cerrarSesion") {
        $module = MODULES_PATH.$enlacesModel.".php";
      }
      return $module;
    }
  }
?>