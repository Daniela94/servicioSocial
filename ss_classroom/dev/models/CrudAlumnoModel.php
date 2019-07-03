<?php
  class CrudAlumnoModel {
    # Mostrar lista de tareas
    # ------------------------------------------------------------
    public function listaAlumnoTareasModel() {
      $sql = "SELECT tarea.*, usuario.id_usuario,usuario.nombre,usuario.apellidos FROM tarea INNER JOIN usuario ON tarea.id_usuario = usuario.id_usuario";
      $cnx = new Conexion();
      $cnx -> conectar();
      $query = mysqli_query($cnx->getCnx(), $sql);
      // var_dump($query);
      // die();
      if (!$query)
        echo "Error: ".mysqli_error($cnx->getCnx());
      return $query;
      mysqli_close($query);
    }
  }
?>