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
    public function listaAlumnoTareasController() {
      $respuesta = CrudAlumnoModel::listaAlumnoTareasModel();
      while ($fila = mysqli_fetch_object($respuesta)) {
        // var_dump($fila);
        // die();
        $titulo = $fila->titulo;
        $descripcion = $fila->descripcion;
        $fecha_publicacion = $fila->fecha_publicacion;
        $fecha_entrega = $fila->fecha_entrega;
        $profesor = $fila->nombre.' '.$fila->apellidos;
        echo "
          <tr>
          <td>".$titulo."</td>
          <td>".$descripcion."</td>
          <td>".$fecha_publicacion."</td>
          <td>".$fecha_entrega."</td>
          <td>".$profesor."</td>
          <td></td>
          <td>
            <a href=''>
              <i class='fas fa-file-upload'></i>
            </a>
          </td>
        </tr>";
      }
    }
  }
?>