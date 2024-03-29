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
    # Checar si ya existe ----------------------------------
    public function verificarRegistroUsuarioController() {
      if (isset($_POST['enviar'])) {

        if (isset($_POST['nombre']) &&
            isset($_POST['apellidos']) &&
            isset($_POST['numero_cuenta']) &&
            isset($_POST['email']) &&
            isset($_POST['pass']) &&
            isset($_POST['password']) &&
            isset($_POST['rol'])) {

          if (empty($_POST['nombre']) ||
              empty($_POST['apellidos']) ||
              empty($_POST['numero_cuenta']) && $_POST['rol'] == '3' ||
              empty($_POST['email']) ||
              empty($_POST['pass']) ||
              empty($_POST['password'])) {
                echo "<br><div class='alert alert-warning' role='alert'>Conteste todos los campos.</div>";
          }
          else {
            // $expresionNombre = '/^[a-zA-Z]*$/';
            // $expresionApellidos = '/^[a-zA-Z]*$/';
            $expresionNombre = '/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/';
            $expresionApellidos = '/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/';
            $expresionNoCuenta = '/^[0-9]{8}$/';
            $expresionVacio = '/^[ ]{0}$/';
            $expresionCorreo = '/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/';
            $expresionPassword = '/^[a-zA-Z0-9]*$/';
            // print_r(preg_match($expresionNoCuenta, $_POST['numero_cuenta']));
            // print_r(preg_match($expresionVacio, $_POST['numero_cuenta']));
            // die();
            if (preg_match($expresionNoCuenta, $_POST['numero_cuenta']) != 0 || preg_match($expresionVacio, $_POST['numero_cuenta']) != 0) {

              if (preg_match($expresionNombre, $_POST['nombre']) != 0 &&
                  preg_match($expresionApellidos, $_POST['apellidos']) != 0 &&
                  preg_match($expresionCorreo, $_POST['email']) != 0 &&
                  preg_match($expresionPassword, $_POST['pass']) != 0 &&
                  preg_match($expresionPassword, $_POST['password']) != 0){

                // print_r(preg_match($expresionNombre, $_POST['nombre']));
                // print_r(preg_match($expresionApellidos, $_POST['apellidos']));
                // // print_r(preg_match($expresionNoCuenta, $_POST['numero_cuenta']));
                // print_r(preg_match($expresionCorreo, $_POST['email']));
                // die();
  
                if ($_POST['pass'] == $_POST['password']) {
  
                  $datosController = array( "nombre"=>$_POST['nombre'],
                                            "apellidos"=>$_POST['apellidos'],
                                            "numero_cuenta"=>$_POST['numero_cuenta'], 
                                            "email"=>$_POST['email'],
                                            "password"=>$_POST['password'],
                                            "rol"=>$_POST['rol']);
                  $verificar = new CrudAdminModel($datosController);
                  $respuesta = $verificar -> verificarRegistroUsuarioModel($datosController);
                  if ($respuesta == NULL) {
                    // echo "No existe";
                    $insertar = $verificar -> registrarUsuarioModel($datosController);
                    if ($insertar == "success") {
                      echo '<script>localStorage.setItem("action","usuarioRegistrado"); window.location.href="templateAdmin.php?action=usuarioRegistrado";</script>';
                    }
                    else {
                      echo '<script>localStorage.setItem("action","error"); window.location.href="templateAdmin.php?action=formRegistrarUsuario";</script>';
                    }
                  }
                  else {
                    echo "<br><div class='alert alert-danger' role='alert'>Este usuario ya existe</div>";
                  }
                }
                else {
                  echo "<br><div class='alert alert-danger' role='alert'>Las contraseñas no coinciden.</div>";
                }
  
              }
              else {
                echo "<br><div class='alert alert-danger' role='alert'>El email no es correcto o ingresó caracteres especiales no válidos.</div>";
              } 
            }
            else {
              echo "<br><div class='alert alert-danger' role='alert'>Número de cuenta incompleta.</div>";
            } 
          }
        }
        else {
          echo "<br><div class='alert alert-warning' role='alert'>Debe enviar todos los campos.</div>";
        }
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
          // var_dump($datosController);
          // die();
          $crud = new CrudAdminModel($datosController);
          $respuesta = $crud -> registrarUsuarioModel($datosController);
          // var_dump($respuesta);
          if ($respuesta == "success") {
            header("location: ".DIR_MODULES."admin/templateAdmin.php?action=usuarioRegistrado");
          } 
          else {
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
        $id_rol = $fila->id_rol;
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
              <a href='templateAdmin.php?action=formEditarUsuario&idEditar=".$id_usuario."'>
                <i class='fas fa-edit'></i>
              </a>
              <a href='#' data-toggle='modal' data-target='#exampleModal' class='borrar' idusuario='".$id_usuario."' idrol='".$id_rol."'>
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
        $id_usuario = $fila->id_usuario;
        $id_rol = $fila->id_rol;      
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
              <a href='templateAdmin.php?action=formEditarUsuario&idEditar=".$id_usuario."'>
                <i class='fas fa-edit'></i>
              </a>
              <a href='#' data-toggle='modal' data-target='#exampleModal' class='borrar' idusuario='".$id_usuario."' idrol='".$id_rol."'>
                <i class='fas fa-trash-alt'></i>
              </a>
            </td>
          </tr>
        ";
      }
    }
    # Mostrar lista de administradores 
    # ----------------------------------------------------------
    public function listaAdminController() {
      $respuesta = CrudAdminModel::listaAdminModel();
      // echo 'res';
      // var_dump($respuesta);
      // die();
      while ($fila = mysqli_fetch_object($respuesta)) {
        $id_usuario = $fila->id_usuario;
        $id_rol = $fila->id_rol;      
        $nombre = $fila->nombre;
        $apellidos = $fila->apellidos;
        $email = $fila->email;
        
        if ($email == "drodriguez@email.com") {
          echo "
          <tr>
            <td>".$nombre."</td>
            <td>".$apellidos."</td>
            <td>".$email."</td>
            <td>
                <i class='fas fa-trash-alt disabled-color'></i>
              </a>
            </td>
          </tr>
        ";
        } 
        else {
          echo "
            <tr>
              <td>".$nombre."</td>
              <td>".$apellidos."</td>
              <td>".$email."</td>
              <td>
                <a href='#' data-toggle='modal' data-target='#exampleModal' class='borrar' idusuario='".$id_usuario."' idrol='".$id_rol."'>
                  <i class='fas fa-trash-alt'></i>
                </a>
              </td>
            </tr>
          ";
        }
      }
    }
    # Mostrar lista de tareas
    # ----------------------------------------------------------
    public function listaTareasController() {
      $respuesta = CrudAdminModel::listaTareasModel();

      setlocale(LC_TIME, 'es_ES.UTF-8');
      date_default_timezone_set('America/Mexico_City');
      $fechaHoy = date("Y-m-d H:i");

      $strFechaHoy = date("Y-m-d");
      $diaHoy = date("d");
      $mesHoy = date("m");
      $yearHoy = date("Y");
      $hora = date("H:i");
      // echo "Día: ".$diaHoy."<br /> Mes: ".$mesHoy."<br /> Año: ".$yearHoy."<br /> Hora: ".$hora."<br /><br />";

      $default_local_date = ucwords(utf8_encode(strftime("%a %d %b, %Y a las %H:%M")));
      $date_connectors_capital = array('A', 'Las');
      $date_connectors_lower = array('a', 'las');
      $hoy = str_replace($date_connectors_capital, $date_connectors_lower, $default_local_date);
      // echo $hoy;
      
      while ($fila = mysqli_fetch_object($respuesta)) {
        $titulo = $fila->titulo;
        $descripcion = $fila->descripcion;      
        $fecha_publicacion = $fila->fecha_publicacion;
        $fecha_entrega = $fila->fecha_entrega;
        $profesor = $fila->nombre.' '.$fila->apellidos;

        $fecha = $fecha_publicacion;
        $fecha = str_replace("/", "-", $fecha);			
        $newDate = date("Y-m-d H:i", strtotime($fecha));			
        $conector = " a las ";
        $fechaFormato = ucfirst("%a %d %b, %Y");
        $horaFormato = "%H:%M";
        $strFecha = $fechaFormato.$conector.$horaFormato;
        $fecha_publicacion = ucfirst(strftime($strFecha, strtotime($newDate)));

        $fechaEntrega = $fecha_entrega;
        $fechaEntrega = str_replace("/", "-", $fechaEntrega);	

        $newDate2 = date("Y-m-d H:i", strtotime($fechaEntrega));
        
        $strFechaEntrega = date("Y-m-d", strtotime($fechaEntrega));
        $diaEntrega = date("d", strtotime($fechaEntrega));
        $mesEntrega = date("m", strtotime($fechaEntrega));
        $yearEntrega = date("Y", strtotime($fechaEntrega));
        $horaEntrega = date("H:i", strtotime($fechaEntrega));

        $fecha_entrega =ucfirst(strftime($strFecha, strtotime($newDate2)));

        echo "
        <tr>
          <td>".$titulo."</td>
          <td>".$descripcion."</td>
          <td class='date'>".$fecha_publicacion."</td>
            <td class='date ";  if ($diaEntrega < $diaHoy && $mesEntrega == $mesHoy && $horaEntrega < $hora || $yearEntrega < $yearHoy) { 
              echo 'late';
            }
            else if ($diaEntrega < $diaHoy && $mesEntrega == $mesHoy && $horaEntrega > $hora) {
              echo 'late';
            }
            else if ($diaEntrega < $diaHoy && $mesEntrega < $mesHoy && $horaEntrega < $hora) {
              echo 'late';
            }
            else if ($diaEntrega == $diaHoy && $mesEntrega == $mesHoy && $horaEntrega < $hora) {
              echo 'late';
            }
            echo "'>".$fecha_entrega."</td>
          <td>".$profesor."</td>
        </tr>
        ";
      }
    }
    
    # Editar usuario 
    # ----------------------------------------------------------
    public function editarUsuarioController() {
      $datosController = $_GET["idEditar"];
      // echo $datosController;
      $respuesta = CrudAdminModel::editarUsuarioModel($datosController);
      // echo $respuesta[2];
      echo "
      <form method='POST'>
        <div class='row'>
          <div class='col'>
            <input type='hidden' value='".$respuesta['id_usuario']."' name='id_usuario'>
            <label for=''>Nombre</label>
            <input type='text' value='".$respuesta['nombre']."' name='nombre' class='input-form' id='nombreRegistro'>
          </div>
          <div class='col'>
            <label for=''>Apellidos</label>
            <input type='text' value='".$respuesta['apellidos']."' name='apellidos' class='input-form' id='apellidosRegistro'>
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
            <input type='password' name='pass' value='".$respuesta['password']."' class='input-form' id='pass'>
          </div>
          <div class='col'>
            <label for=''>Confirmar contraseña</label>
            <input type='password' value='".$respuesta['password']."' name='password' class='input-form' id='password'>
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
            <input type='submit' value='Actualizar' name='editarUsuario' class='input-form form-btn-green'>
          </div>  
        </div>
      </form>";
    }
    # Actualizar usuario
    # -----------------------------------------------------
    public function actualizarUsuarioController() {
      if (isset($_POST['editarUsuario'])) {

        if (isset($_POST['nombre']) &&
            isset($_POST['apellidos']) &&
            isset($_POST['numero_cuenta']) &&
            isset($_POST['email']) &&
            isset($_POST['pass']) &&
            isset($_POST['password']) &&
            isset($_POST['rol'])) {

          if (empty($_POST['nombre']) ||
              empty($_POST['apellidos']) ||
              empty($_POST['numero_cuenta']) && $_POST['rol'] == '3' ||
              empty($_POST['email']) ||
              empty($_POST['pass']) ||
              empty($_POST['password'])) {
                echo "<br><div class='alert alert-warning' role='alert'>Conteste todos los campos.</div>";
          }
          else {
            // $expresionNombre = '/^[a-zA-Z]*$/';
            // $expresionApellidos = '/^[a-zA-Z]*$/';
            $expresionNombre = '/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/';
            $expresionApellidos = '/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/';
            $expresionNoCuenta = '/^[0-9]{8}$/';
            $expresionVacio = '/^[ ]{0}$/';
            $expresionCorreo = '/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/';
            $expresionPassword = '/^[a-zA-Z0-9]*$/';
            // print_r(preg_match($expresionNoCuenta, $_POST['numero_cuenta']));
            // print_r(preg_match($expresionVacio, $_POST['numero_cuenta']));
            // die();
            if (preg_match($expresionNoCuenta, $_POST['numero_cuenta']) != 0 || preg_match($expresionVacio, $_POST['numero_cuenta']) != 0) {

              if (preg_match($expresionNombre, $_POST['nombre']) != 0 &&
                  preg_match($expresionApellidos, $_POST['apellidos']) != 0 &&
                  preg_match($expresionCorreo, $_POST['email']) != 0 &&
                  preg_match($expresionPassword, $_POST['pass']) != 0 &&
                  preg_match($expresionPassword, $_POST['password']) != 0){
                
                // print_r(preg_match($expresionNombre, $_POST['nombre']));
                // print_r(preg_match($expresionApellidos, $_POST['apellidos']));
                // // print_r(preg_match($expresionNoCuenta, $_POST['numero_cuenta']));
                // print_r(preg_match($expresionCorreo, $_POST['email']));
                // die();
  
                if ($_POST['pass'] == $_POST['password']) {
  
                  $datosController = array( "id_usuario"=>$_POST["id_usuario"],
                                            "nombre"=>$_POST["nombre"],
                                            "apellidos"=>$_POST["apellidos"],
                                            "numero_cuenta"=>$_POST["numero_cuenta"],
                                            "email"=>$_POST["email"],
                                            "password"=>$_POST["password"],
                                            "rol"=>$_POST["rol"]);
                  $respuesta = CrudAdminModel::actualizarUsuarioModel($datosController);
                  // echo $respuesta;
                  // die();
                  if ($respuesta == "success2") {
                    echo '<script>localStorage.setItem("action","actualizacionProfesor"); window.location.href="templateAdmin.php?action=actualizacionProfesor";</script>';
                    // header("location: ".DIR_MODULES."admin/templateAdmin.php?action=actualizacionProfesor");
                  }
                  else if ($respuesta == "success3") {
                    echo '<script>localStorage.setItem("action","actualizacionAlumno"); window.location.href="templateAdmin.php?action=actualizacionAlumno";</script>';

                    // header("location: ".DIR_MODULES."admin/templateAdmin.php?action=actualizacionAlumno");
                  }
                  else {
                    echo "Error al intentar actualizar el usuario";
                    header("location: ".DIR_MODULES."admin/templateAdmin.php?action=formEditarUsuario");
                  }
                  
                }
                else {
                  echo "<br><div class='alert alert-danger' role='alert'>Las contraseñas no coinciden.</div>";
                }
  
              }
              else {
                echo "<br><div class='alert alert-danger' role='alert'>Caracteres especiales no válidos.</div>";
              } 
            }
            else {
              echo "<br><div class='alert alert-danger' role='alert'>Número de cuenta incompleta.</div>";
            } 
          }
        }
        else {
          echo "<br><div class='alert alert-warning' role='alert'>Debe enviar todos los campos.</div>";
        }
      }
    }
    # Eliminar usuario
    # ------------------------------------------------------------------
    public function eliminarUsuarioController() {
      if (isset($_GET['idBorrar'])) {
        $datosController = array( "id_usuario" => $_GET['idBorrar'],
                                  "id_rol" => $_GET['idRol']);
        // print_r($datosController);
        // die();
        $respuesta = CrudAdminModel::eliminarUsuarioModel($datosController);

        if ($respuesta == "success1") {
          echo '<script>localStorage.setItem("action","eliminacionAdmin"); window.location.href="templateAdmin.php?action=eliminacionAdmin";</script>';
        }
        if ($respuesta == "success2") {
          echo '<script>localStorage.setItem("action","eliminacionProfesor"); window.location.href="templateAdmin.php?action=eliminacionProfesor";</script>';
        }
        if ($respuesta == "success3") {
          echo '<script>localStorage.setItem("action","eliminacionAlumno"); window.location.href="templateAdmin.php?action=eliminacionAlumno";</script>';
        }
      }
    }
  }
?>