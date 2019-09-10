<?php
  $listaTareas = new ProfesorController();
  $listaTareas -> eliminarTareaProfesorController();
  if (isset($_GET['action'])) {
    if ($_GET['action'] == "actualizacionTarea") {
      echo "<br><br><div class='alert alert-success' role='alert'>Actualizacion exitosa</div>";
    }
    if ($_GET['action'] == "eliminacionTarea") {
      echo "<br><br><div class='alert alert-success' role='alert'>Eliminación exitosa</div>";
    }
  }
?>
<h4 class="h-subtitle">TAREAS REGISTRADAS</h4>
<table id="table_id" class="table table-lista">
  <thead>
    <tr>
      <th>Título</th>
      <th>Descripción</th>
      <th>Fecha de publicación</th>
      <th>Fecha de entrega</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $listaTareas -> listaTareasProfesorController();
    ?>
  </tbody>
</table>