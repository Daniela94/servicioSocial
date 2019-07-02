<?php 
  class AlumnoController {
    # Interacción del alumno con los enlaces de la página
    # --------------------------------------------------
    public function enlacesVistasAlumnoController() {
      if (isset($_GET['action'])) {
        $enlacesController = $_GET['action'];

        $respuesta = EnlacesAlumnoModel::enlacesVistasAlumnoModel($enlacesController);

        include $respuesta;
      } else {
        echo "<h2 class='h-title'>Bienvenido(a) al SISTEMA ssClassroom</h2>";
      }
    }
  }
?>