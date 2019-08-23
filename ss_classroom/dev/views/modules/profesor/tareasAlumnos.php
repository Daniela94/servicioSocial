<h4 class="h-subtitle">Tarea de los alumnos</h4>
<table class="table table-lista">
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
<?php
  if (isset($_GET['action'])) {
    # MENSAJE CALIFICACIÓN EXITOSA
    if ($_GET['action'] == "tareaCalificada") {
      echo "Tarea calificada con exito";
    }
    # MENSAJE ACTUALIZACIÓN EXITOSA
    if ($_GET['action'] == "tareaActualizada") {
      echo "Calificación actualizada con exito";
    }
    # MENSAJE TAREA RECHAZADA
    if ($_GET['action'] == "tareaRechazada") {
      echo "Tarea rechazada";
    }
  }
?>