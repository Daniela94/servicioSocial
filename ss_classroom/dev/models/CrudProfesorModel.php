<?php
 require_once 'Conexion.php';

  class CrudProfesorModel {
    // ATRIBUTOS
    private $id_usuario;
    private $id_tarea;
    private $titulo;
    private $descripcion;
    private $fecha_publicacion;
    private $fecha_entrega;
    // MÉTODOS
    # Constructor
    # ------------------------------------------
    public function __construct($datosModel) {
      $this->id_usuario = $datosModel['id_usuario'];
      // $this->id_tarea = $datosModel['id_tarea'];
      $this->titulo = $datosModel['titulo'];
      $this->descripcion = $datosModel['descripcion'];
      $this->fecha_publicacion = $datosModel['fecha_publicacion'];
      $this->fecha_entrega = $datosModel['fecha_entrega'];
    }
    # Registrar tarea 
    # ----------------------------------------------
    public function registrarTareaModel() {
      $sql = "INSERT INTO tarea(id_usuario,titulo, descripcion, fecha_publicacion, fecha_entrega) VALUES ($this->id_usuario,'$this->titulo','$this->descripcion','$this->fecha_publicacion','$this->fecha_entrega')";
      // var_dump($sql);
      // die();
      $cnx = new Conexion();
      $cnx -> conectar();
      $query = mysqli_query($cnx->getCnx(), $sql);
      // var_dump($query);
      // var_dump(mysqli_affected_rows($cnx->getCnx()));
      // var_dump(mysqli_error($cnx->getCnx()));
      // die();
      if ($query == true) 
        return "success";
      else
        echo "Error al intentar hacer el registro. Vuelva a intentarlo";
      mysqli_close($query);
    }
    # Mostrar lista de tareas
    # ------------------------------------------------------------
    public function listaTareasProfesorModel() {
      $id_usuario = $_SESSION['id_usuario'];
      $sql = "SELECT * FROM tarea WHERE id_usuario = $id_usuario";
      $cnx = new Conexion();
      $cnx -> conectar();
      $query = mysqli_query($cnx->getCnx(), $sql);
      if (!$query)
        echo "Error al mostrar lista.";
      return $query;
      mysqli_close($query);
    }
    # Editar tarea
    # ----------------------------------------------------
    public function editarTareaProfesorModel($datosModel) {
      $sql = "SELECT * FROM tarea WHERE id_tarea = $datosModel";
      $cnx = new Conexion();
      $cnx -> conectar();
      $query = mysqli_query($cnx->getCnx(), $sql);
      $row = mysqli_fetch_array($query);
      if (!$query)
      echo "Ocurrió un error. Vuelva a intentarlo.";
      return $row;
      mysqli_close($query);
    }
    # Actualizar tarea
    # ---------------------------------------------------------
    public function actualizarTareaProfesorModel($datosModel) {
      $id_usuario = $datosModel['id_usuario'];
      $id_tarea = $datosModel['id_tarea'];
      $titulo = $datosModel['titulo'];
      $descripcion = $datosModel['descripcion'];
      $fecha_publicacion = $datosModel['fecha_publicacion'];
      $fecha_entrega = $datosModel['fecha_entrega'];

      $sql = "UPDATE tarea SET titulo = '$titulo', descripcion = '$descripcion', fecha_publicacion = '$fecha_publicacion', fecha_entrega = '$fecha_entrega' WHERE id_tarea = $id_tarea";
      // print_r($sql);
      // die();
      $cnx = new Conexion();
      $cnx -> conectar();
      $query = mysqli_query($cnx->getCnx(), $sql);
        // var_dump($query);
        // die();
      if ($query == true) {
        return "success";
      } else
        echo "Error al actualizar el registro. Vuelva a intentarlo.";
      mysqli_close($query);
    }
    # Eliminar tarea
    # -----------------------------------
    public function eliminarTareaProfesorModel($datosModel) {
      $sql = "DELETE FROM tarea WHERE id_tarea = $datosModel";
      $cnx = new Conexion();
      $cnx -> conectar();
      $query = mysqli_query($cnx->getCnx(), $sql);
      if ($query == true) {
        return "success";
      } else
        echo "Error al eliminar el registro. Vuelva a intentarlo.";
      mysqli_close($query);
    }
    # Mostrar lista de status de tareas de los alumnos
    # ------------------------------------------------
    public function listaTareasAlumnosProfesorModel($id_tarea) {
      $sql = "SELECT usuario.id_usuario, usuario.nombre, usuario.apellidos, alumno_tareas.id_alumno_tareas, alumno_tareas.id_tarea, alumno_tareas.archivo, alumno_tareas.calificacion, alumno_tareas.status FROM usuario LEFT JOIN alumno_tareas ON usuario.id_usuario = alumno_tareas.id_usuario AND alumno_tareas.id_tarea = $id_tarea WHERE id_rol = 3";
      // echo $sql;
      // die();
      $cnx = new Conexion();
      $cnx -> conectar();
      $query = mysqli_query($cnx->getCnx(), $sql);
      if (!$query)
        echo "Error al mostrar la lista.";
      // var_dump($query);
      // die();
      return $query;
      mysqli_close($query);
    }
    # Calificar tarea
    # ------------------------------------------------------
    public function calificarTareaAlumnoProfesorModel($datosModel) {
      $id_tarea = $datosModel['id_tarea'];
      $calificacion = $datosModel['calificacion'];
      $sql = "UPDATE alumno_tareas SET calificacion = $calificacion, status = 2 WHERE id_tarea = $id_tarea";
      // echo $sql;
      // die();
      $cnx = new Conexion();
      $cnx -> conectar();
      $query = mysqli_query($cnx->getCnx(), $sql);
      // var_dump($query);
      // die();
      if ($query == true) {
        return "success";
      } else
        echo "Error al calificar la tarea. Vuelva a intentarlo.";
      mysqli_close($query);
    }
    # Cambiar calificación -----------------------------------
    # --------------------------------------------------------
    public function editarCalificacionAlumnoProfesorModel($datosModel) {
      // var_dump($datosModel);
      // die();
      $sql = "SELECT calificacion FROM alumno_tareas WHERE id_tarea = $datosModel";
      $cnx = new Conexion();
      $cnx -> conectar();
      $query = mysqli_query($cnx->getCnx(), $sql);
      $row = mysqli_fetch_array($query);
      if (!$query)
      echo "Ocurrió un error. Vuelva a intentarlo.";
      return $row;
      mysqli_close($query);
    }
    # Actualizar calificación
    public function actualizarCalificacionAlumnoProfesorModel($datosModel) {
      $calificacion = $datosModel['calificacion'];
      $id_tarea = $datosModel['id_tarea'];
      $sql = "UPDATE alumno_tareas SET calificacion = $calificacion, status = 2 WHERE id_tarea = $id_tarea";
      // var_dump($datosModel);
      // die();
      $cnx = new Conexion();
      $cnx -> conectar();
      $query = mysqli_query($cnx->getCnx(), $sql);
      if ($query == true) {
        return "success";
      } else
        echo "Error al actualizar la calificación. Vuelva a intentarlo.";
      mysqli_close($query);
    }
    # Rechazar tarea
    # ---------------------------------------------------------
    public function rechazarTareaAlumnoProfesorModel($id_tarea) {
      $sql = "UPDATE alumno_tareas SET status = 3, calificacion = 0 WHERE id_tarea = $id_tarea";
      // var_dump($sql);
      // die();
      $cnx = new Conexion();
      $cnx -> conectar();
      $query = mysqli_query($cnx->getCnx(), $sql);
      // var_dump($query);
      // die();
      if ($query == true) {
        return "success";
      } else
        echo "Error al rechazar la tarea. Vuelva a intentarlo.";
      mysqli_close($query);
    }
  }
?>
