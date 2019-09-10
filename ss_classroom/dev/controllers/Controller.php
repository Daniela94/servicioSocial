<?php
  class Controller {
    # Llamada a la página de login
    # ------------------------------------------
    public function loginPage() {
        include (VIEW_PATH.'login.php');
        // echo VIEW_PATH;
    }
    # Validar login del usuario
    # -------------------------------------------------
    public function loginUsuarioController() {
      
      if (isset($_POST['entrar'])) {
        
        if (isset($_POST['usuario']) && isset($_POST['password'])) {
          // print_r($_POST);
          // die();
          if (empty($_POST['usuario']) || empty($_POST['password'])) {
            echo "<span id='error-login'>Conteste todos los campos.</span>";
          }
          else {
            $expresionCorreo = '/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/';
            $expresionNoCuenta = '/^[0-9]{8}*$/';
            $expresionPassword = '/^[a-zA-Z0-9]{1-8}*$/';
            // echo preg_match($expresionPassword, $_POST['password']);
            // die();
            if (preg_match($expresionCorreo, $_POST['usuario']) != 0 || 
                preg_match($expresionNoCuenta, $_POST['usuario']) != 0 && 
                preg_match($expresionPassword, $_POST['password']) != 0) {
                
                $usuario = $_POST['usuario'];
                $password = $_POST['password'];         

              $respuesta = Crud::loginUsuarioModel($usuario,$password);
              if($respuesta !== FALSE) {
      
                # Ingreso como administrador
                # ------------------------------------------------------------------------------
                if($respuesta['id_rol'] == 1){
                  // creamos la sesión del usuario administrador
                  session_start();
      
                  $_SESSION['validar'] = true;
                  $_SESSION['id_usuario'] = $respuesta['id_usuario'];
                  $_SESSION['usuario'] = $respuesta['nombre'];
      
                  header('location: '.DIR_MODULES.'admin/templateAdmin.php');
      
                # Ingreso como Profesor
                # ------------------------------------------------------------------------------
                } else if($respuesta['id_rol'] == 2){
                  session_start();
      
                  $_SESSION['validar'] = true;
                  $_SESSION['id_usuario'] = $respuesta['id_usuario'];
                  $_SESSION['usuario'] = $respuesta['nombre'];
      
                  header('location: '.DIR_MODULES.'profesor/templateProfesor.php');
      
                # Ingreso como Alumno
                # -------------------------------------------------------------------------------
                } else if($respuesta['id_rol'] == 3){
                  session_start();
                  
                  $_SESSION['validar'] = true;
                  $_SESSION['id_usuario'] = $respuesta['id_usuario'];
                  $_SESSION['usuario'] = $respuesta['nombre'];
      
                  header('location: '.DIR_MODULES.'alumno/templateAlumno.php');
                }
              }
              else {
                echo "<span id='error-login'>Usuario y/o contraseña no válidos.</span>";
              }
            }  
            else {
              echo "<span id='error-login'>Caracteres especiales no válidos.</span>";
            }
          }
        }
        else {
          echo "<span id='error-login'>Debe enviar todos los campos.</span>";
        }

      }
    }
  }
?>