<?php
  class CrudAlumnoModel {
    // MÉTODOS
    # Mostrar lista de tareas
    # ------------------------------------------------------------
    public function listaTareasAlumnoModel($id_usuario) {
      $sql = "SELECT tarea.*, u.id_usuario, u.nombre, u.apellidos, a_t.id_usuario, a_t.calificacion, a_t.status FROM tarea INNER JOIN usuario AS u ON tarea.id_usuario = u.id_usuario LEFT OUTER JOIN alumno_tareas AS a_t ON tarea.id_tarea = a_t.id_tarea AND $id_usuario = a_t.id_usuario";
      // echo $sql.'<br />';
      // die();
      $cnx = new Conexion();
      $cnx -> conectar();
      $query = mysqli_query($cnx->getCnx(), $sql);
      if (!$query)
        echo "Error: ".mysqli_error($cnx->getCnx());
      return $query;
      mysqli_close($query);
    }
    # Subir tarea
    # ---------------------------------------------
    public function subirTareaAlumnoModel($datosModel) {
      var_dump($datosModel);
      // die();
      // $titulo = $datosModel['titulo'];
      $id_usuario = $datosModel['id_usuario'];
      $id_tarea = $datosModel['id_tarea'];
      $archivo = $datosModel['archivo'];
      $sqlCont = "SELECT COUNT(*) FROM alumno_tareas WHERE id_tarea = $id_tarea AND id_usuario = $id_usuario";
      echo $sqlCont;
      // die();
      $cnx = new Conexion();
      $cnx -> conectar();
      $queryCont = mysqli_query($cnx->getCnx(), $sqlCont);
      var_dump(mysqli_num_rows($queryCont));
      // die();
      if(mysqli_num_rows($queryCont)>0) {
        $sql = "UPDATE alumno_tareas SET archivo = '$archivo', status = 1 WHERE id_tarea = $id_tarea AND id_usuario = $id_usuario";
      } else {
        $sql = "INSERT INTO alumno_tareas(id_usuario,id_tarea,calificacion,archivo,status) VALUES ($id_usuario,$id_tarea,0,'$archivo',1)";
      }
      // echo $sql.'<br />';
      // die();
      $query = mysqli_query($cnx->getCnx(), $sql);
      if ($query == true)
        return "success";
      else
        echo "Error al intentar subir la tarea: ".mysqli_error($cnx->getCnx());
      mysqli_close($query);
    }
  }
?>