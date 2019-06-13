<?php 
  
  class Controller {
    
    // LLAMADA A LA PÁGINA LOGIN
    public function loginPage() {
      include (VIEW_PATH.'login.php');
      // echo VIEW_PATH;
      // echo "hola";

    }

    // INTERACCIÓN DEL ADMIN CON LA PÁGINA
    public function enlacesVistasAdminController() {
      if (isset($_GET['action'])) {

        $enlacesController = $_GET['action'];
        // vamos a enviarle al modelo la petición del contenido
        // tomar del model la clase
        // con doble dos puntos heredamos la clase y hacemos referencia a la función
        $respuesta = EnlacesVistasAdmin::enlacesVistasAdminModel($enlacesController);
  
        include $respuesta;
      } else {
        echo "<h2 class='h-title'>Administrador Bienivenido al SISTEMA ssClassroom</h2>";
      }
    }
  }

?>