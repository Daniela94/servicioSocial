<h4 class="h-subtitle">TAREAS ASIGNADAS</h4>
<?php
  if (isset($_GET['action'])) {
    if($_GET['action'] == "envioExitoso") {
      echo "<div class='alert alert-success' role='alert'>Se subió la tarea con éxito</div>";
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
</table>
<script>
  $(document).ready( function () {
    $('#table_id').DataTable();
  });
</script>