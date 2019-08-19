<?php
  class CrudAlumnoModel {
    # Mostrar lista de tareas
    # ------------------------------------------------------------
    public function listaTareasAlumnoModel($id_usuario) {
      $sql = "SELECT tarea.*, u.nombre, u.apellidos, a_t.id_usuario, a_t.status FROM tarea INNER JOIN usuario AS u ON tarea.id_usuario = u.id_usuario LEFT OUTER JOIN alumno_tareas AS a_t ON tarea.id_tarea = a_t.id_tarea AND $id_usuario = a_t.id_usuario";
      // echo $sql.'<br />';
      // die();
      $cnx = new Conexion();
      $cnx -> conectar();
      $query = mysqli_query($cnx->getCnx(), $sql);
      if (!$query)
        echo "Error: ".mysqli_error($cnx->getCnx());
      return $query;
      mysqli_close($query);
      // SELECT tarea.*, usuario.id_usuario,usuario.nombre,usuario.apellidos, alumno_tareas.status FROM tarea INNER JOIN usuario INNER JOIN alumno_tareas ON tarea.id_usuario = usuario.id_usuario AND alumno_tareas.id_tarea = tarea.id_tarea AND alumno_tareas.id_usuario = usuario.id_usuario

      // SELECT tarea.*, usuario.id_usuario,usuario.nombre,usuario.apellidos, alumno_tareas.status FROM tarea INNER JOIN usuario INNER JOIN alumno_tareas ON tarea.id_usuario = usuario.id_usuario

      // SELECT (tarea.* from tarea INNER JOIN usuario ON campo relacionado) LEFT JOIN tarea.*, usuario.id_usuario,usuario.nombre,usuario.apellidos, alumno_tareas.status FROM tarea INNER JOIN usuario RIGHT JOIN alumno_tareas ON tarea.id_usuario = usuario.id_usuario AND alumno_tareas.id_tarea = tarea.id_tarea AND alumno_tareas.id_usuario = usuario.id_usuario

      // SELECT * FROM tarea LEFT JOIN alumno_tareas ON tarea.id_usuario = alumno_tareas.id_usuario

      // DOMINGO -----------------------------
      // SELECT tarea.titulo, tarea.fecha_publicacion, tarea.fecha_entrega, usuario.id_usuario,usuario.nombre,usuario.apellidos FROM tarea INNER JOIN usuario ON tarea.id_usuario = usuario.id_usuario LEFT JOIN (SELECT status FROM alumno_tareas WHERE EXISTS id_usuario FROM alumno_tareas WHERE EXISTS id_usuario) ON usuario.id_usuario = alumno_tareas.id_usuario
    }
  }
?>