<?php
require_once MODEL_PATH.'CrudProfesorModel.php';

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
    # Registrar nueva tarea 
    # ------------------------------------------------------
    public function registrarTareaController() {
      if (isset($_POST['enviar'])) {
        // recibir el POST en un array
        $datosController = array( "titulo"=>$_POST['titulo'],
                                  "descripcion"=>$_POST['descripcion'],
                                  "fecha_publicacion"=>$_POST['fecha_publicacion'],
                                  "fecha_entrega"=>$_POST['fecha_entrega']);
        // var_dump($datosController);
        // die();
        // var_dump($datosController);
        // echo "entra <br />";
        $crud = new CrudProfesorModel($datosController);
        $respuesta = $crud -> registrarTareaModel();
        if ($respuesta == "success") {
          header("location: ".DIR_MODULES."profesor/templateProfesor.php?action=ok");
        } else { 
          header("location: ".DIR_MODULES."profesor/templateProfesor.php?action=formRegistrarTarea");
        }
      }
    }
    # Mostrar lista de tareas
    # ---------------------------------------------------------------
    public function listaProfesorTareasController() {
      $respuesta = CrudProfesorModel::listaProfesorTareasModel();
      while ($fila = mysqli_fetch_object($respuesta)) {
        $titulo = $fila->titulo;
        $descripcion = $fila->descripcion;
        $fecha_publicacion = $fila->fecha_publicacion;
        $fecha_entrega = $fila->fecha_entrega;
        echo "
          <tr>
          <td>".$titulo."</td>
          <td>".$descripcion."</td>
          <td>".$fecha_publicacion."</td>
          <td>".$fecha_entrega."</td>
          <td>
            <a href='templateProfesor.php?action=tareasAlumnos'>
              <i class='fas fa-external-link-alt'></i>
            </a>
            <a href=''>
              <i class='fas fa-edit'></i>
            </a>
            <a href=''>
              <i class='fas fa-trash-alt'></i>
            </a>
          </td>
        </tr>";
      }
    }

  }
?>