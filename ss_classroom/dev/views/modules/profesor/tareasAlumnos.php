<h4 class="h-subtitle">Tarea de los alumnos</h4>
<?php
  if (isset($_GET['action'])) {
    # MENSAJE CALIFICACIÓN EXITOSA
    if ($_GET['action'] == "tareaCalificada") {
      echo "<div class='alert alert-success' role='alert'>Tarea calificada con exito</div>";
    }
    # MENSAJE ACTUALIZACIÓN EXITOSA
    if ($_GET['action'] == "tareaActualizada") {
      echo "<div class='alert alert-success' role='alert'>Calificación actualizada con exito</div>";
    }
    # MENSAJE TAREA RECHAZADA
    if ($_GET['action'] == "tareaRechazada") {
      echo "<div class='alert alert-danger' role='alert'>Tarea rechazada</div>";
    }
  }
?>
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