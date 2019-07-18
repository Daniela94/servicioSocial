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
        // que me traiga la información que está en el modelo
        $crud = new CrudAdminModel($datosController);
        $respuesta = $crud -> registrarUsuarioModel();
        if ($respuesta == "success") {
          header("location: ".DIR_MODULES."admin/templateAdmin.php?action=ok");
        } else {
          header("location: ".DIR_MODULES."admin/templateAdmin.php?action=formRegistrarUsuario");
        }
      }
    }
    # Mostrar lista de profesores 
    # ----------------------------------------------------------
    public function listaProfesoresController() {
      $respuesta = CrudAdminModel::listaProfesoresModel();
      // echo 'res';
      // var_dump($respuesta);
      // die();
      while ($fila = mysqli_fetch_object($respuesta)) {
        $id_usuario = $fila->id_usuario;
        $nombre = $fila->nombre;
        $apellidos = $fila->apellidos;
        $email = $fila->email;
        // print_r($fila);
        // die();

        echo "
          <tr>
            <td>".$nombre."</td>
            <td>".$apellidos."</td>
            <td>".$email."</td>
            <td>
              <a href='templateAdmin.php?action=editarUsuario&id=".$id_usuario."'>
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
      $respuesta = CrudAdminModel::listaAlumnosModel();
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
    #Editar usuario 
    # ----------------------------------------------------------
    public function editarUsuarioController() {
      $datosController = $_GET["id"];
      // echo $datosController;
      $respuesta = CrudAdminModel::editarUsuarioModel($datosController);
      // echo $respuesta[2];
      echo "
      <form method='POST'>
        <div class='row'>
          <div class='col'>
            <label for=''>Nombre</label>
            <input type='text' value='".$respuesta['nombre']."' name='nombre' class='input-form'>
          </div>
          <div class='col'>
            <label for=''>Apellidos</label>
            <input type='text' value='".$respuesta['apellidos']."' name='apellidos' class='input-form'>
          </div>
        </div>
        <div class='row'>
          <div class='col'>
            <label for=''>Número de cuenta</label>
            <input type='' value='".$respuesta['numero_cuenta']."' name='numero_cuenta' class='input-form'>
          </div>
          <div class='col'>
            <label for=''>Correo electrónico</label>
            <input type='email' value='".$respuesta['email']."' name='email' class='input-form'>
          </div>
        </div>
        <div class='row'>
          <div class='col'>
            <label for=''>Contraseña</label>
            <input type='text' value='".$respuesta['password']."' class='input-form'>
          </div>
          <div class='col'>
            <label for=''>Confirmar contraseña</label>
            <input type='text' value='".$respuesta['password']."' name='password' class='input-form'>
          </div>
        </div>
        <div class='row'>
          <div class='col'>
            <label for=''>Rol</label>
            <select name='rol' class='input-form'>Tipo de usuario
              <option value='1'".(($respuesta['id_rol'] == 1) ? 'selected = "selected"':"").">Administrador</option>
              <option value='2'".(($respuesta['id_rol'] == 2) ? 'selected = "selected"':"").">Profesor</option>
              <option value='3'".(($respuesta['id_rol'] == 3) ? 'selected = "selected"':"").">Estudiante</option>
            </select>
          </div>
        </div>
        <div class='row'>
          <div class='col'>
            <a href='templateAdmin.php?action=listaProfesores' class='input-form btn form-btn-red'>Cancelar</a>
          </div>
          <div class='col'>
            <input type='submit' value='Actualizar' class='input-form form-btn-green'>
          </div>  
        </div>
      </form>";
    }

  }
?>