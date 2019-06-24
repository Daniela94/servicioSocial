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
          if($respuesta['id_rol'] == 1){
            header('location: '.DIR_MODULES.'admin/templateAdmin.php');
          }else if($respuesta['id_rol'] == 2){
            header('location: '.DIR_MODULES.'profesor/templateProfesor.php');
          }else if($respuesta['id_rol'] == 3){
  
          }
        }else{
          header('location:'.DIR_ROOT.'index.php');
          echo "No existe";  
        }
      }
    }
  }
?>