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
      $this->id_tarea = $datosModel['id_tarea'];
      $this->titulo = $datosModel['titulo'];
      $this->descripcion = $datosModel['descripcion'];
      $this->fecha_publicacion = $datosModel['fecha_publicacion'];
      $this->fecha_entrega = $datosModel['fecha_entrega'];
    }
    # Registrar tarea 
    # ----------------------------------------------
    public function registrarTareaModel() {
      $sql = "INSERT INTO tarea(id_usuario,titulo, descripcion, fecha_publicacion, fecha_entrega) VALUES ($this->id_usuario,'$this->titulo','$this->descripcion','$this->fecha_publicacion','$this->fecha_entrega')";
      $cnx = new Conexion();
      $cnx -> conectar();
      $query = mysqli_query($cnx->getCnx(), $sql);
      if ($query == true) 
        return "success";
      else
        echo "Error al intentar hacer el registro. ¿Le tiene miedo al éxito?.<br />".mysqli_error($cnx).'<br />'.$sql;
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
        echo "Error: ".mysqli_error($cnx->getCnx());
      return $query;
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
        echo "Error al intentar eliminar el registro. ¿Le tiene miedo al éxito?.<br />".mysqli_error($cnx->getCnx()).'<br />'.$sql;
      mysqli_close($query);
    }
    # Mostrar lista de status de tareas de los alumnos
    # ------------------------------------------------
    public function listaTareasAlumnoProfesorModel() {
      $sql = "SELECT usuario.id_usuario, usuario.nombre, usuario.apellidos, alumno_tareas.archivo, alumno_tareas.status FROM alumno_tareas INNER JOIN usuario ON alumno_tareas.id_usuario = usuario.id_usuario WHERE id_rol = 3";
      $cnx = new Conexion();
      $cnx -> conectar();
      $query = mysqli_query($cnx->getCnx(), $sql);
      if (!$query)
        echo "Error: ".mysqli_error($cnx->getCnx());
      return $query;
      mysqli_close($query);
    }

  }
?>
