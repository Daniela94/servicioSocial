<?php
  // require_once MODEL_PATH.'CrudProfesorModel.php';

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
        $datosController = array( "id_usuario"=>$_SESSION['id_usuario'],
                                  "titulo"=>$_POST['titulo'],
                                  "descripcion"=>$_POST['descripcion'],
                                  "fecha_publicacion"=>$_POST['fecha_publicacion'],
                                  "fecha_entrega"=>$_POST['fecha_entrega']);
        var_dump($datosController);
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
    public function listaTareasProfesorController() {
      $respuesta = CrudProfesorModel::listaTareasProfesorModel();
      while ($fila = mysqli_fetch_object($respuesta)) {
        $id_tarea = $fila->id_tarea;
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
            <a href='templateProfesor.php?action=formEditarTarea&idEditar=".$id_tarea."'>
              <i class='fas fa-edit'></i>
            </a>
            <a href='templateProfesor.php?action=misTareas&idBorrar=".$id_tarea."'>
              <i class='fas fa-trash-alt'></i>
            </a>
          </td>
        </tr>";
      }
    }
    # Editar tarea
    # -----------------------------------------------------
    public function editarTareaProfesorController() {
      $datosController = $_GET['idEditar'];
      $respuesta = CrudProfesorModel::editarTareaProfesorModel($datosController);
      // echo $respuesta[4];
      $fecha_inicio = $respuesta['fecha_publicacion'];
      $fecha_inicio = strtotime("$fecha_inicio");
      $fecha_publicacion = date("Y-m-d", $fecha_inicio);

      $fecha_fin = $respuesta['fecha_entrega'];
      $fecha_fin = strtotime("$fecha_fin");
      $fecha_entrega = date("Y-m-d", $fecha_fin);
      echo "
      <form action='' method='POST'>
        <div class='row'>
          <div class='col'>
            <label for=''>Título</label>
            <input type='hidden' value='".$respuesta['id_tarea']."' name='id_tarea'>
            <input type='text' value='".$respuesta['titulo']."' name='titulo' class='input-form'>
          </div>
        </div>
        <div class='row'>
          <div class='col'>
            <label for=''>Descripción</label>
            <textarea rows='4' cols='50' name='descripcion' class='input-form'>".$respuesta['descripcion']."</textarea>
          </div>
        </div>
        <div class='row'>
          <div class='col'>
            <label for=''>Fecha de publicación</label>
            <input type='date' value='".$fecha_publicacion."' name='fecha_publicacion' class='input-form'>
          </div>
          <div class='col'>
            <label for=''>Fecha de entrega</label>
            <input type='date' name='fecha_entrega' value='".$fecha_entrega."' class='input-form'>
          </div>
        </div>
        <div class='row'>
          <div class='col'>
            <a href='templateProfesor.php' class='input-form btn form-btn-red'>Cancelar</a>
          </div>
          <div class='col'>
            <input type='submit' name='editarTarea' value='Actualizar' class='input-form form-btn-green'>
          </div>
        </div>
      </form>
      ";
    }
    # Actualizar tarea
    # --------------------------------------------------------------
    public function actualizarTareaProfesorController() {
      if (isset($_POST['editarTarea'])) {
        $datosController = array( "id_usuario"=>$_SESSION['id_usuario'],
                                  "id_tarea"=>$_POST['id_tarea'],
                                  "titulo"=>$_POST['titulo'],
                                  "descripcion"=>$_POST['descripcion'],
                                  "fecha_publicacion"=>$_POST['fecha_publicacion'],
                                  "fecha_entrega"=>$_POST['fecha_entrega']);
                                  $actualizar = new CrudProfesorModel($datosController);
        $respuesta = $actualizar -> actualizarTareaProfesorModel();
  
        if ($respuesta == "success") {
          header("location: ".DIR_MODULES."profesor/templateProfesor.php?action=actualizacionTarea");
        }
      }

    }
    # Eliminar tareas 
    # -----------------------------------------------------------------------
    public function eliminarTareaProfesorController() {
      if (isset($_GET['idBorrar'])) {
        $datosController = $_GET['idBorrar'];
        $respuesta = CrudProfesorModel::eliminarTareaProfesorModel($datosController);

        if ($respuesta == "success") {
          header("location:".DIR_MODULES."profesor/templateProfesor.php?action=eliminacionTarea");
        }

      }
    }
    # Mostrar lista de status de tareas de los alumnos
    # ----------------------------------------------------------------
    public function listaTareasAlumnosProfesorController() {
      // var_dump($_SERVER['DOCUMENT_ROOT']);
      $respuesta = CrudProfesorModel::listaTareasAlumnoProfesorModel();
      while ($fila = mysqli_fetch_object($respuesta)) {
        $nombre = $fila->nombre;
        $apellidos = $fila->apellidos;
        $archivo = $fila->archivo;
        $calificacion = $fila->calificacion;
        $status = $fila->status;
 
        if ($status == 0 || $archivo == "") {
          $status = "No entregado";
          $archivo = "Vacío";
          echo "
          <tr>
            <td>".$nombre."</td>
            <td>".$apellidos."</td>
            
            <td class='disabled-color'>".$archivo."</td>
            <td class='status'>".$status."</td>
            <td class='disabled-color'>Calificar | Rechazar
            </td>
          </tr>
        ";
        }
        if ($status == 1) {
          $status = "No calificado";
          // echo $archivo;
          // die();
          echo "
          <tr>
            <td>".$nombre."</td>
            <td>".$apellidos."</td>
            <td><a href='".DIR_VIEWS."assets/tareas/".$archivo."' target='_blank'><i class='fas fa-file-pdf'></a></i></td>
            <td>".$status."</td>
            <td>
              <a href='templateProfesor.php?action=formCalificarTarea'>
                Calificar |
              </a>
              <a href=''>
                Rechazar
            </td>
          </tr>
        ";
        }
        if ($status == 2) {
          $status = $calificacion;
          echo "
          <tr>
            <td>".$nombre."</td>
            <td>".$apellidos."</td>
            <td>".$archivo."</td>
            <td>".$status."</td>
            <td>
              <a href='templateProfesor.php?action=formCalificarTarea'>
                Editar |
              </a>
              <a href=''>
                Rechazar
            </td>
          </tr>
        ";
        }   
      }
    }

  }
?>