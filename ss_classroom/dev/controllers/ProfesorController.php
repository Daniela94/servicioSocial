<?php
  class ProfesorController {
    # Interacción del profesor con los enlaces de la página
    # --------------------------------------------------
    public function enlacesVistasProfesorController() {
      if (isset($_GET['action'])) {

        $enlacesController = $_GET['action'];
        // vamos a enviarle al modelo la petición del contenido
        // tomar del model la clase
        // con doble dos puntos heredamos la clase y hacemos referencia a la función
        $respuesta = EnlacesProfesorModel::enlacesVistasProfesorModel($enlacesController);
  
        include $respuesta;
      } else {
        echo "<h2 class='h-title'>Bienvenido(a) al SISTEMA ssClassroom</h2>";
      }
    }
  }
?>