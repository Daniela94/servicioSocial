<?php 
  class AdminController {
    # Interacción del administrador con los enlaces de la página
    # --------------------------------------------------
    public function enlacesVistasAdminController() {
      if (isset($_GET['action'])) {

        $enlacesController = $_GET['action'];
        // vamos a enviarle al modelo la petición del contenido
        // tomar del model la clase
        // con doble dos puntos heredamos la clase y hacemos referencia a la función
        $respuesta = EnlacesAdminModel::enlacesVistasAdminModel($enlacesController);
  
        include $respuesta;
      } else {
        echo "<h2 class='h-title'>Bienvenido al SISTEMA ssClassroom</h2>";
      }
    }

    # Registro de usuarios
    # -----------------------------------------
    public function registrarUsuarioController() {

      if (isset($_POST['enviar'])) {
        // recibir el POST en un array
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
      }
    }
    # Mostrar lista de profesores 
    # ----------------------------------------------------------
    public function listaProfesoresController() {
      $respuesta = Crud::listaProfesoresModel();
      // echo 'res';
      // var_dump($respuesta);
      // die();
      while ($fila = mysqli_fetch_object($respuesta)) {
        $nombre = $fila->nombre;
        $apellidos = $fila->apellidos;
        $email = $fila->email;

        echo "
          <tr>
            <td>".$nombre."</td>
            <td>".$apellidos."</td>
            <td>".$email."</td>
            <td>
              <a href=''>
                <i class='fas fa-edit'></i>
              </a>
              <a href=''>
                <i class='fas fa-trash-alt'></i>
              </a>
            </td>
          </tr>
        ";
      }
    }
    # Mostrar lista de alumnos 
    # ----------------------------------------------------------
    public function listaAlumnosController() {
      $respuesta = Crud::listaAlumnosModel();
      // echo 'res';
      // var_dump($respuesta);
      // die();
      while ($fila = mysqli_fetch_object($respuesta)) {
        $nombre = $fila->nombre;
        $apellidos = $fila->apellidos;
        $email = $fila->email;
        $numero_cuenta = $fila->numero_cuenta;

        echo "
          <tr>
            <td>".$nombre."</td>
            <td>".$apellidos."</td>
            <td>".$email."</td>
            <td>".$numero_cuenta."</td>
            <td>
              <a href=''>
                <i class='fas fa-edit'></i>
              </a>
              <a href=''>
                <i class='fas fa-trash-alt'></i>
              </a>
            </td>
          </tr>
        ";
      }
    }

  }
?>