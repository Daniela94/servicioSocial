<h4 class="h-subtitle">TAREAS ASIGNADAS</h4>
<?php
  if (isset($_GET['action'])) {
    if($_GET['action'] == "envioExitoso") {
      echo "<br><div class='alert alert-success alert-dismissible fade show' role='alert'>Se subió la tarea con éxito <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button></div></div>";
    }
  }
?>
<table id="table_id" class="table table-lista">
  <thead>
    <tr>
      <th>Título</th>
      <th>Descripción</th>
      <th>Fecha de publicación</th>
      <th>Fecha de entrega</th>
      <th>Profesor</th>
      <th>Status</th>
      <th>Entregar</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $listaTareas = new AlumnoController();
      $listaTareas -> listaTareasAlumnoController();
    ?>
  </tbody>
</table><br>