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

        // print_r($_POST);
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        $respuesta = Crud::loginUsuarioModel($usuario,$password);
        if($respuesta !== FALSE) {
          var_dump($respuesta);
          // Ingreso como administrador --------------------
          if($respuesta['id_rol'] == 1){
            // creamos la sesión del usuario administrador
            session_start();

            $_SESSION['validar'] = true;
            $_SESSION['id_usuario'] = $respuesta['id_usuario'];
            $_SESSION['usuario'] = $respuesta['nombre'];

            header('location: '.DIR_MODULES.'admin/templateAdmin.php');

          // Ingreso como Profesor --------------------
          }else if($respuesta['id_rol'] == 2){
            session_start();

            $_SESSION['validar'] = true;
            $_SESSION['id_usuario'] = $respuesta['id_usuario'];
            $_SESSION['usuario'] = $respuesta['nombre'];

            header('location: '.DIR_MODULES.'profesor/templateProfesor.php');

          // Ingreso como Alumno --------------------
          }else if($respuesta['id_rol'] == 3){
            session_start();
            
            $_SESSION['validar'] = true;
            $_SESSION['id_usuario'] = $respuesta['id_usuario'];
            $_SESSION['usuario'] = $respuesta['nombre'];

            header('location: '.DIR_MODULES.'alumno/templateAlumno.php');
          }
        } else {
          header('location:'.DIR_ROOT.'index.php');
          echo "No existe";  
        }
      }
    }
  }
?>