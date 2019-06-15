<?php 
  class Controller {
    
    // Llamada a la página de login
    // ------------------------------------------
    public function loginPage() {
      include (VIEW_PATH.'login.php');
      // echo VIEW_PATH;
      // echo "hola";

    }

    // Interacción del administrador con los enlaces de la página
    // --------------------------------------------------
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

    // Registro de usuarios
    // -----------------------------------------
    public function registrarUsuarioController() {

      if (isset($_POST['enviar'])) {

        // recibir el POST
        $datosController = array( "nombre"=>$_POST['nombre'],
                                  "apellidos"=>$_POST['apellidos'],
                                  "numero_cuenta"=>$_POST['numero_cuenta'], 
                                  "email"=>$_POST['email'],
                                  "password"=>$_POST['password'],
                                  "rol"=>$_POST['rol']);
        #que me traiga la información que está en el modelo
        // $respuesta = Crud::metdodo($datosController); 
        $crud = new Crud($datosController);
        $respuesta = $crud -> registrarUsuarioModel();
  
        echo $respuesta;
        // echo 'Entra';
      }
    }
  }

?>