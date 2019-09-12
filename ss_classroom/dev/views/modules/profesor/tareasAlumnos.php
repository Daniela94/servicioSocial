<?php
  if (isset($_GET['action'])) {
    # MENSAJE CALIFICACIÓN EXITOSA
    if ($_GET['action'] == "tareaCalificada") {
      echo "<br><div class='alert alert-success' role='alert'>Tarea calificada con exito</div>";
    }
    # MENSAJE ACTUALIZACIÓN EXITOSA
    if ($_GET['action'] == "tareaActualizada") {
      echo "<br><div class='alert alert-success' role='alert'>Calificación actualizada con exito</div>";
    }
    # MENSAJE TAREA RECHAZADA
    if ($_GET['action'] == "tareaRechazada") {
      echo "<br><div class='alert alert-danger' role='alert'>Tarea rechazada</div>";
    }
    #  MENSAJE CALIFICACIÓN ACTUALIZADA
    if($_GET['action'] == "calificacionActualizada") {
      echo "<br><div class='alert alert-success' role='alert'>Calificación actualizada.</div>";
    }
  }
?>
<h4 class="h-subtitle">Tarea de los alumnos</h4>
<table id="table_id" class="table table-lista">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>Entregable</th>
      <th>Status / Calificación</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php
      if (isset($_GET['rechazarTarea'])) {
        $tareasAlumnos = new ProfesorController();
        $tareasAlumnos -> rechazarTareaAlumnoProfesorController();
      }
      $tareasAlumnos = new ProfesorController();
      $tareasAlumnos -> listaTareasAlumnosProfesorController();
      // if (isset($_GET['titulo']))
      //   $tiulo = $_GET['titulo'];
      // echo $titulo;
    ?>  
  </tbody>
</table>