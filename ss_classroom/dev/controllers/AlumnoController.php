<?php 
 
  class AlumnoController {
    # Interacción del alumno con los enlaces de la página
    # --------------------------------------------------
    public function enlacesVistasAlumnoController() {
      if (isset($_GET['action'])) {
        $enlacesController = $_GET['action'];

        $respuesta = EnlacesAlumnoModel::enlacesVistasAlumnoModel($enlacesController);

        include $respuesta;
      } else {
        echo "<h2 class='h-title'>Bienvenido(a) al SISTEMA ssClassroom</h2>";
      }
    }
    # Mostrar lista de tareas
    # ---------------------------------------------------------------
    public function listaTareasAlumnoController() {
      // print_r($_SESSION);
      $id_usuario = $_SESSION['id_usuario'];
      $respuesta = CrudAlumnoModel::listaTareasAlumnoModel($id_usuario);
      while ($fila = mysqli_fetch_object($respuesta)) {
        // var_dump($fila);
        // die();
        $id_usuario = $fila ->id_usuario;
        $id_tarea = $fila->id_tarea;

        $titulo = $fila->titulo;
        $descripcion = $fila->descripcion;
        $fecha_publicacion = $fila->fecha_publicacion;
        $fecha_entrega = $fila->fecha_entrega;
        $status = $fila->status;
        if ($status == 0) {
          $status = "No entregado";
        } else {
          $status = "Entregado";
        }
        $profesor = $fila->nombre.' '.$fila->apellidos;
        // $profesor = $fila->id_usuario;
        echo "
          <tr>
          <td>".$titulo."</td>
          <td>".$descripcion."</td>
          <td>".$fecha_publicacion."</td>
          <td>".$fecha_entrega."</td>
          <td>".$profesor."</td>
          <td class='".(($status == 'Entregado') ? 'status entregado' : 'status no-entregado')."'>".$status."</td>
          <td>
            <a href='templateAlumno.php?action=formSubirTarea&titulo=".$titulo."&idUsuario=".$id_usuario."&idTarea=".$id_tarea."'>
              <i class='fas fa-file-upload'></i>
            </a>
          </td>
        </tr>";
      }
    }
    # Subir tarea
    # ----------------------------------------------------------------
    public function subirTareaAlumnoController() {
      $titulo = $_GET['titulo'];
      if (isset($_POST['enviarTarea'])) {
        print_r($_FILES);
        $archivoNombre = $_FILES['archivo']['name'];
        $archivoGuardado = $_FILES['archivo']['tmp_name'];
        if (!file_exists(VIEW_PATH.'assets/tareas')) {
          mkdir(VIEW_PATH.'assets/tareas', 0777, true);
          if (file_exists(VIEW_PATH.'assets/tareas')) {
            if(move_uploaded_file($archivoGuardado, VIEW_PATH.'assets/tareas/'.$archivoNombre)) {
              echo "Tarea subida con éxito";
            } else {
              echo "No se subió";
            }
          }
        } else {
          if(move_uploaded_file($archivoGuardado,VIEW_PATH.'assets/tareas/'.$archivoNombre)) {
            echo "Tarea subida con éxito";
          } else {
            echo "No se subió";
          }
        }
        die();
        // $datosController = array( "id_usuario"=>$_GET['id_usuario'],
        //                           "id_tarea"=>$_GET['id_tarea'],
        //                           "archivo"=>$_FILES['archivo']);
        // if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
        //   // obtener detalles del archivo cargado
        //   $fileTmpPath = $_FILES['archivo']['tmp_name'];
        //   $fileName = $_FILES['archivo']['name'];
        //   $fileSize = $_FILES['archivo']['size'];
        //   $fileType = $_FILES['archivo']['type'];
        //   $fileNameCmps = explode(".", $fileName);
        //   $fileExtension = strtolower(end($fileNameCmps));
        //   // eliminar espacios y caracteres especiales del archivo
        //   $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        //   $allowedfileExtensions = array('jpg', 'png', 'zip', 'txt', 'xls', 'doc', 'pdf', 'docx', 'pptx');
        //   if (in_array($fileExtension, $allowedfileExtensions)) {
        //     $subirTarea = new CrudAlumnoModel();
        //     $respuesta = $subirTarea -> subirTareaAlumnoModel($datosController);
        //     if ($respuesta == "success") {
        //       header("location: ".DIR_MODULES."alumno/templateAlumno.php?action=envioExitoso&titulo='.$titulo.'");
        //     } else {
        //       header("location: ".DIR_MODULES."alumno/templateAlumno.php?action=formSubirTarea&titulo='.$titulo.'");
        //     }
        //   }
        // }  
        
      }
    }
  }
?>