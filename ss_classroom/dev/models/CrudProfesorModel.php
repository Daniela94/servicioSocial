<?php
 require_once 'Conexion.php';

  class CrudProfesorModel {
    // ATRIBUTOS
    private $idUsuario;
    private $titulo;
    private $descripcion;
    private $fecha_publicacion;
    private $fecha_entrega;
    // MÉTODOS
    # Constructor
    # ------------------------------------------
    public function __construct($datosModel) {
      $this->idUsuario = $datosModel['id_usuario'];
      $this->titulo = $datosModel['titulo'];
      $this->descripcion = $datosModel['descripcion'];
      $this->fecha_publicacion = $datosModel['fecha_publicacion'];
      $this->fecha_entrega = $datosModel['fecha_entrega'];
    }
    # Registrar tarea 
    # ----------------------------------------------
    public function registrarTareaModel() {
      $sql = "INSERT INTO tarea(id_usuario,titulo, descripcion, fecha_publicacion, fecha_entrega) VALUES ($this->idUsuario,'$this->titulo','$this->descripcion','$this->fecha_publicacion','$this->fecha_entrega')";
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
    public function listaProfesorTareasModel() {
      $sql = "SELECT * FROM tarea";
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
