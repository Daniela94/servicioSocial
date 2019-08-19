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
            <a href=''>
              <i class='fas fa-file-upload'></i>
            </a>
          </td>
        </tr>";
      }
    }
  }
?>